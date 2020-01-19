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
            <form id="erregistro" name="erregistro" action="Signup.php" method="post" enctype="multipart/form-data">
				<strong>Eposta(*)</strong>: <input type="text" id="eposta" name="eposta" size="80" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" ></input> <a id="epostaCheck"></a> <a id="emaitza"></a><br>
				<strong>Deiturak(*)</strong>: <input type="text" id="deiturak" name="deiturak" size="80" pattern="[a-zA-Z]{2,}( [a-zA-Z]{2,}){1,}"></input></br>
				<strong>Pasahitza(*)</strong>: <input type="password" id="pasahitza1" name="pasahitza1" size="80"></input><a id="emaitzapass"></a><br>
				<strong>Berriro pasahitza(*)</strong>: <input type="password" id="pasahitza2" name="pasahitza2" size="80"></input> <a id="error" color="red"></a></br>
				<input type="submit" id="submit" value=" Bidali "></input>
				<input type="reset" id="ezabatu" value=" Ezabatu "></input><br>
			</form>
        </div>
    </header>
    <section id="portfolio" class="p-0"></section>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../js/script.min.js"></script>
	<script>
			$(document).ready(function(){
				$(':input[type="submit"]').prop('disabled', true);
				$("#pasahitza1").focusout(function(){
					botoia();
				});
				$("#pasahitza2").focusout(function(){
					botoia();
				});
		
			});
	</script>
	<script>

	function botoia(){
		var pas1=document.getElementById('pasahitza1').value;
		var pas2=document.getElementById('pasahitza2').value;

		if(pas1.trim()===pas2.trim()){
			
			document.getElementById("submit").disabled = false; 
			
		}else{
	
			document.getElementById("submit").disabled = true; 
		}

	}


</script>
</body>
<?php include '../php/DbConfig.php' ?>
</html>
<?php

 if(isset($_POST['eposta'])){
	 
			if(!$_POST['eposta']){
				echo("<script> alert('Email atala bete behar da.');</script>");
				exit();
			}
			if(!$_POST['deiturak']){
				echo("<script> alert('Deitura atala bete behar da.');</script>");
				exit();
			}
			if(!$_POST['pasahitza1']){
				echo("<script> alert('Pasahitza atala bete behar da.');</script>");
				exit();
			}
			if(strcmp($_POST['pasahitza1'],$_POST["pasahitza2"])){
				echo("<script> alert('Pasahitzak ez dira berdinak.');</script>");
				exit();
			}
		
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT email FROM users';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo("<script> alert('Errorea: ezin izan da datu basea atzitu');</script>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT email FROM users') as $row){
					if (!(strcmp($row['email'],$_POST["eposta"]))){
						echo("<script> alert('Korreoa erregistratuta dago');</script>");
						exit();
					}		
				}
			}
			$sql = "INSERT INTO users (email, pass, deiturak) VALUES('$_POST[eposta]' , '$_POST[pasahitza1]', '$_POST[deiturak]')";
			
			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<script> alert('Errorea: ezin izan da erregistroa bete');</script>");
			}
			else{
				echo("<script> alert('Erregistratu zara'); window.location.replace('Layout.php');</script>");
			}
			
			mysqli_close($konexioa);
			
			
 }

?>
