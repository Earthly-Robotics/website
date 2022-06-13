<?php 	include_once "nav.php"; 

$flowerProject = fopen("flowerGolemBlog.txt", "r") or die("Unable to open file!");
$copperProject = fopen("copperGolemBlog.txt", "r") or die("Unable to open file!");
$ironProject = fopen("ironGolemBlog.txt", "r") or die("Unable to open file!");

$projects = [$flowerProject, $copperProject, $ironProject];
$titles = [];
$frontImg = [];
$backImg = [];
$discs = [];
$leftover = [];

$p = count($projects);
for($i=0; $i<$p; $i++){
	while(!feof($projects[$i])){
	  	$line = fgets($projects[$i]);
	  	if (strpos($line, 'TITLE') !== false) {
	    	$title = str_replace("TITLE"," ", $line) ;
	    	array_push($titles, $title);
		}else if(strpos($line, 'FRONTIMG') !== false){
			$fImg = str_replace("FRONTIMG"," ", $line) ;
			array_push($frontImg, $fImg);
		}else if(strpos($line, 'BACKIMG') !== false){
			$bImg = str_replace("BACKIMG"," ", $line) ;
			array_push($backImg, $bImg);
		}else if(strpos($line, 'DISC') !== false){
			$disc = str_replace("DISC"," ", $line) ;
			array_push($discs, $disc);
		}else{
			array_push($leftover, $line);
		}
	} 
	fclose($projects[$i]);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="style.css">
		<title>Home</title>
	</head>
	<body>
		<div id="demo" style="position:absolute;color:white;font-size: 25px;">

		</div>
		<img src="img/Header.jpg" width="100%">
     	<div class="container-fluid darkSquare">
     		<div class="container">
     			<div class="row">
     				<div class="col-lg-6 p-5">
     					<img src="img/LogoUnderText.png" class="img-fluid" alt="..." >
     				</div>
     				<div class="col-lg-6 align-self-center">
     					<div class="center">
				     		<h1 class="text-white pt-3">Ons Doel</h1>
				     		<p class="text-white">Een nieuwe manier vinden om robotica-expertise in te zetten om de wereld te vergroenen en bijen weer een zonnige toekomst te bieden.</p>
				     	</div>
     				</div>
     			</div>
     		</div>
     	</div>
	    <div class="container-fluid">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<h1 class="text-center m-4">Onze Producten </h1>
	    			</div>
	    			<div class="col-lg-4 cardu">
	    				<div class="card bg-dark text-white">
						  <img src="img/<?php echo $backImg[0];?>" class="card-img" alt="...">
						  <div class="card-img-overlay" style="height:50px;">
						     <img src="img/<?php echo $frontImg[0];?>" class="img-fluid px-3" alt="FlowerGolem" height="90%">
						     
						  </div>
						  <div class="card-body center">
							   <h5 class="card-title"><?php echo $titles[0];?></h5>
							   <p class="card-text" style="text-align: left"><?php echo $discs[0];?></p>
							   <a href="blog.php?project=flower" class="butt">Go to the blog</a>
						  </div>
						</div>
					</div>
					<div class="col-lg-4 cardu">
						<div class="card bg-dark text-white">
						    <img src="img/<?php echo $backImg[1];?>" class="card-img" alt="...">
						    <div class="card-img-overlay" style="height:50px;">
						    	<img src="img/<?php echo $frontImg[1];?>" class="img-fluid px-3" alt="CopperGolem" height="180px" style="opacity:150%">
						    
						  	</div>
						  	<div class="card-body center" style="height: 240px;">
							    <h5 class="card-title "><?php echo $titles[1];?></h5>
							    <p class="card-text" style="text-align: left"><?php echo $discs[1];?></p>
							    <a href="blog.php?project=copper" class="butt">Go to the blog</a>
						  	</div>
						</div>
					</div>
					<div class="col-lg-4 cardu center">
						<div class="card bg-dark text-white">
						  <img src="img/<?php echo $backImg[2];?>" class="card-img" alt="...">
						  <div class="card-img-overlay" style="height:50px;">
						     <img src="img/<?php echo $frontImg[2];?>" class="img-fluid px-5" alt="IronGolem" height="170px" style="opacity:150%">
						  </div>
						  <div class="card-body center"  style="height: 240px;">
							   <h5 class="card-title"><?php echo $titles[2];?></h5>
							   <p class="card-text" style="text-align: left"><?php echo $discs[2];?></p>
							   <a href="blog.php?project=iron" class="butt">Go to the blog</a>
						  </div>
						</div>
					</div>
					
				</div>
    		</div>
    	</div>
    	<hr  style="width:80%; margin: 0 auto; background-color: #; margin: 4%;margin-left:10%; margin-left: 10%;">
    	<div class="container">
    		<div class="row">
 				<div class="col-lg-6 p-5 m-3">
 					<img src="img/group.png" class="img-fluid" alt="..." >
 				</div>
 				<div class="col-lg-5 align-self-center">
 					<div class="center margin">
			     		<h1 class="card-title fs-bold">Ons Team</h1>
					   <p class="card-text">Dit zijn de mensen die jou blij willen maken met een robot</p>
					   <a href="team.php" class="butt ">View Team</a>
			     	</div>
 				</div>
 			</div>
    	</div>

		<div class="container-fluid darkSquare">
     		<div class="container">
     			<div class="row">
     				<div class="col-lg-6 p-5">
     					<img src="img/FlowerGolem.png" class="img-fluid" alt="..." >
     				</div>
     				<div class="col-lg-6 align-self-center">
     					<div class="center">
				     		<h1 class="text-white pt-3">Onze Blog</h1>
				     		<p class="text-white">De voortgang van onze reis in de ondernemerswereld.</p>
							<a href="blog.php?project=flower" class="butt ">View Blog</a>
				     	</div>
     				</div>
     			</div>
     		</div>
     	</div>
     	<div class="container-fluid">
     		<div class="container">
     			<div class="row d-flex justify-content-center">
	    			<div class="col-lg-12">
	    				<h1 class="text-center m-4">Met dank aan onze sponsor </h1>
	    			</div>

					<div class="col-lg-12 w-50">
						 <a class="" href="https://www.hzpc.com/nl">
	    					<img src="img/Logo_Small_Red.png" class="card-img" alt="sponsor" >
	    				</a>
					</div>

					
					</div>
	    		</div>
     	</div>
     	
	    	
	     	
	   <?php include_once "footer.php";  ?> 
	   <script>
			// Set the date we're counting down to
			var countDownDate = new Date("Jun 23, 2022 12:00:00").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

	  			// Get today's date and time
	  			var now = new Date().getTime();
	  		  
	  			// Find the distance between now and the count down date
	  			var distance = countDownDate - now;
	    
	  			// Time calculations for days, hours, minutes and seconds
	  			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	    
	  			// Output the result in an element with id="demo"
	  			document.getElementById("demo").innerHTML ="<b>Tijd tot Wedstrijd</b><br> " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
	    
	 		 	// If the count down is over, write some text 
	  			if (distance < 0) {
	    			clearInterval(x);
	    			document.getElementById("demo").innerHTML = "EXPIRED";
	  			}
			}, 1000);
	</script>
	</body>
</html>