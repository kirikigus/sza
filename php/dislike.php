<?php include '../php/DbConfig.php' ?>
<?php			
if(isset($_POST['bideojoko'])){
	//bideojokoaren dislike kontagailua update egin
		$bideojoko=$_POST["bideojoko"];
		$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
		$sql = 'SELECT * FROM bideojokoak WHERE bideojokoa="$bideojoko"';
		$x=@mysqli_query($konexioa,$sql);
			if(!$x){
				echo ("<p>Errorea: ezin izan da datu basea atzitu</p>");
				exit();
			}
		foreach ($konexioa->query("SELECT * FROM bideojokoak WHERE bideojokoa='$bideojoko'") as $row){ 
				$oldlikes=$row['dislikes'];       
				$likes=$oldlikes+1;
				$query2="UPDATE bideojokoak SET dislikes='$likes' WHERE bideojokoa='$bideojoko'";
				$ema2=@mysqli_query($konexioa,$query2);
			}



		
}
	
	
?>
  