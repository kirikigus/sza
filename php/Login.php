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
					<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Layout.php">HASIERA</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Login.php">LOGIN</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="Signup.php">SIGN UP</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead text-center text-white d-flex" style="background-image:url('../img/header.jpg');">
        <div class="container my-auto">
            <form id="login" name="login" action="Login.php" method="post" enctype="multipart/form-data">
				<strong>Eposta(*)</strong>: <input type="text" id="eposta" name="eposta" size="80"></input><br>
				<strong>Pasahitza(*)</strong>: <input type="password" id="pasahitza" name="pasahitza" size="80"></input><br>
				</fieldset></br>
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
		
		if(isset($_POST["eposta"])){
			if(!$_POST['eposta']){
				echo("<script> alert('Email atala bete behar da.');</script>");
				exit();
			}
			if(!$_POST['pasahitza']){
				echo("<script> alert('Pasahitza atala bete behar da.');</script>");
				exit();
			}
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<script> alert('Errorea: ezin izan da konexioa ezarri');</script>");
			
			$query = 'SELECT email, pass FROM users';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo("<script> alert('Errorea: ezin izan da datu basea atzitu');</script>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT email, pass FROM users') as $row){

					if (!(strcmp($row['email'],$_POST["eposta"]))) {

						if(!(strcmp($row['pass'],$_POST["pasahitza"]))){ 
					
							$URL = "LayoutL.php";
							echo "<script> alert('Ondo Logeatu zara.');</script>".'<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
							exit();
														
						}
					}
					
				}
				echo("<script> alert('Datuak ez dira zuzenak.');</script>");
			}
			
			mysqli_close($konexioa);
				
		}
		
	?>