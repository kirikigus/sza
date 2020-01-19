<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top"><br><strong>GAMEREVIEW</strong><br><br></a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation" ><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
					<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="LayoutL.php">HASIERA</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="kritika.php">KRITIKA BAT EGIN</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Addbideojoko.php">BIDEOJOKO BAT SARtU</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Layout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead text-center text-white d-flex" style="background-image:url('../img/header.jpg');">
        <div class="container my-auto">
            <form id="add" name="add" action="Addbideojoko.php" method="post" enctype="multipart/form-data">
				<strong>Bideojokoaren Izena</strong>: <input type="text" id="bideojokoa" name="bideojokoa" size="80"></input><br>
				<strong>Egilearen Izena</strong>: <input type="text" id="egilea" name="egilea" size="80"></input><br>
				<strong>Urtea</strong>: <input type="text" id="urtea" name="urtea" size="80"></input><br>
				<input type="submit" id="submit" value=" Bidali"></input>
				<input type="reset" id="ezabatu" value=" Ezabatu " ></input><br>
			</form>
        </div>
    </header>
    <section id="portfolio" class="p-0"></section>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../js/script.min.js"></script>
</body>
<?php include '../php/DbConfig.php' ?>
</html>
<?php
	if(isset($_POST["bideojokoa"])){
		//daturen bat falta
			if(!$_POST['bideojokoa']){
				echo("<script> alert('Bideojoko atala bete behar da.');</script>");
				exit();
			}
			if(!$_POST['egilea']){
				echo("<script> alert('Egilea atala bete behar da.');</script>");
				exit();
			}
			if(!$_POST['urtea']){
				echo("<script> alert('Urtea atala bete behar da.');</script>");
				exit();
			}
			//konexioa ezarri
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT bideojokoa FROM bideojokoak';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo("<script> alert('Errorea: ezin izan da datu basea atzitu');</script>");
				exit();
			}
			//konexioa ondo joan da
			else{
				foreach ($konexioa->query('SELECT bideojokoa FROM bideojokoak') as $row){
					if (!(strcmp($row['bideojokoa'],$_POST["bideojokoa"]))){
						echo("<script> alert('Bideojokoa erregistratuta dago jadanik');</script>");
						exit();
					}		
				}
			}
			//bideojokoaren izena db-an sartu eta like eta dislike kontagailuak 0-ra ezarri
			$sql = "INSERT INTO bideojokoak (bideojokoa, likes, dislikes) VALUES('$_POST[bideojokoa]' , '0', '0')";
			
			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<script> alert('Errorea: ezin izan da bideojokoa gehitu.');</script>");
			}
			else{
				//games.xml-an beste datuak gorde
				$asmentitems = simplexml_load_file("../xml/Games.xml");
				$item = $asmentitems->addChild('assessmentItem');
				$item->addAttribute('bideojoko',$_POST['bideojokoa']);
				$item2=$item->addChild('egileak');
				$item2->addChild('p',$_POST['egilea']);
				$item3=$item->addChild('urtea');
				$item3->addChild('p',$_POST['urtea']);
				$asmentitems->asXML('../xml/Games.xml');
				echo("<script> alert('Bideojokoa ondo sartu da.'); window.location.replace('LayoutL.php');</script>");
			}
			
			mysqli_close($konexioa);
			
			
			
	}
?>