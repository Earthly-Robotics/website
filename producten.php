<?php include_once "nav.php"; 
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
		<title>Producten</title>
		<link rel="stylesheet" href="style.css">
	    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</head>
	<body>
		<div class="container-fluid">
	    	<div class="container">
	    		<div class="row p-4">
					<div class="col-6 m-auto card" style="border: none;">
						<img src="img/<?php echo $backImg[0];?>" class="card-img" alt="..." style="border-radius: 6px;">
						<div class="card-img-overlay p-0" style="height: 50px;">
						    <img src="img/<?php echo $frontImg[0];?>" class="img-fluid px-5 m-4" alt="FlowerGolem" width="90%" style="opacity:150%">
						</div>
						<div class="card-body text-center">
						   <h3 class="card-title fw-bold "><?php echo $titles[0];?></h3>
						   <p class="card-text"><?php echo $discs[0];?></p>
						   
						   <a href="blog.php?project=flower" class="butt" style="background-color: #46c2c7; border-radius: 30px;">Go to the blog</a>
						</div>
						
					</div>
				</div>
				<hr>
				<div class="row p-4">
					<div class="col-6 m-auto card" style="border: none;">
						<img src="img/<?php echo $backImg[1];?>" class="card-img" alt="..." style="border-radius: 6px;">
						<div class="card-img-overlay p-0" style="height: 50px;">
						    <img src="img/<?php echo $frontImg[1];?>" class="img-fluid px-5 m-4" alt="CopperGolem" width="90%" style="opacity:150%">
						</div>
						<div class="card-body text-center">
						   <h3 class="card-title fw-bold "><?php echo $titles[1];?></h3>
						   <p class="card-text"><?php echo $discs[1];?></p>
						   <a href="blog.php?project=copper" class="butt" style="background-color: #46c2c7; border-radius: 30px;">Go to the blog</a>
						</div>
						
					</div>
				</div>
				<hr>
				<div class="row p-4">
					<div class="col-6 m-auto card" style="border: none;">
						<img src="img/<?php echo $backImg[2];?>" class="card-img" alt="..." style="border-radius: 6px;">
						<div class="card-img-overlay p-0" style="height: 50px;">
						    <img src="img/<?php echo $frontImg[2];?>" class="img-fluid px-5 mx-5" alt="IronGolem" width="85%" style="opacity:150%">
						</div>
						<div class="card-body text-center">
						   <h3 class="card-title fw-bold "><?php echo $titles[2];?></h3>
						   <p class="card-text"><?php echo $discs[2];?></p>
						   <a href="blog.php?project=iron" class="butt" style="background-color: #46c2c7; border-radius: 30px;">Go to the blog</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	    <?php include_once "footer.php";?>
	</body>
</html>