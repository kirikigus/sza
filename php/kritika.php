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
	<?php include '../php/DbConfig.php' ?>
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
            <div class="table-responsive">
				<?php
					$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<script> alert('Errorea: ezin izan da konexioa ezarri');</script>");
					$query = 'SELECT bideojokoa FROM bideojokoak';
					$ema=@mysqli_query($konexioa,$query);
					if(!$ema){
						echo("<script> alert('Errorea: ezin izan da datu basea atzitu');</script>");
						exit();
					}
		
		
		?>
                <table class="table">  	
					<thead>
					<tr>
						<td>Bideojokoa</td> 
						<td>Like</td>
						<td>Dislike</td>
					</tr>
					</thead>
                   	<?php $bid=0; foreach ($konexioa->query('SELECT DISTINCT bideojokoa FROM bideojokoak') as $row){ $bid=$bid+1; ?>
						<tr>
							<td><span id=<?php echo $bid;?>><?php echo $row['bideojokoa']?></span></td>
							<td><input id=<?php echo "g".$bid;?> type="button" value="Like" onclick="like(document.getElementById(<?php echo $bid;?>).innerHTML);"></input></td>
							<td><input id=<?php echo "g".$bid;?> type="button" value="Dislike" onclick="dislike(document.getElementById(<?php echo $bid;?>).innerHTML);"></input></td>
						</tr>
				<?php
				}
				?>
                </table>
            </div>
        </div>
    </header>
    <section id="portfolio" class="p-0"></section>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../js/script.min.js"></script>
	<script>

    function like(b){
		
		var formData = new FormData();
		formData.append('bideojoko', b);
	
        $.ajax({
                data: formData, 
                url:   '../php/like.php', 
                type:  'POST', 
				enctype:'multipart/form-data',
				processData:false,
				contentType:false,
				cache:false,
                success:  function (d) { 
                    alert("Like ondo eman da.");
                },
				error: function(){
					alert("Like ez da ondo eman.");
						
				}
        });
	}

	
	function dislike(b){

		var formData = new FormData();
		formData.append('bideojoko', b);
		
        $.ajax({
                data: formData, 
                url:   '../php/dislike.php', 
                type:  'POST', 
				enctype:'multipart/form-data',
				processData:false,
				contentType:false,
				cache:false,
                success:  function (d) { 
                    alert("Dislike ondo eman da.");
                },
				error: function(){
					alert("Dislike ez da ondo eman.");	
				}
        });
	
	}
	

		
    
    </script>
	
	
</body>

</html>