<?php include_once "nav.php"; 

if ($_GET['num']==1)
{
	$blognum = 1;
	$myfile = fopen("flowerGolemBlog.txt", "r") or die("Unable to open file!");
	
}else if ($_GET['num']==2)
{
	$blognum = 2;
	$myfile = fopen("copperGolemBlog.txt", "r") or die("Unable to open file!");
	
}else if ($_GET['num']==3)
{
	$blognum = 3;
	$myfile = fopen("ironGolemBlog.txt", "r") or die("Unable to open file!");
	
}else{
	echo "no blog yet";
}

$leftover = [];
$kopjes = [];
$textenA = [];
$textenB = [];
$textenC = [];
$textenD = [];


while(!feof($myfile)){
  	$line = fgets($myfile);
  	if (strpos($line, 'TITLE') !== false) {
    	$title = str_replace("TITLE"," ", $line) ;
	}else if(strpos($line, 'FRONTIMG') !== false){
		$frontImg = str_replace("FRONTIMG"," ", $line) ;
	}else if(strpos($line, 'BACKIMG') !== false){
		$backImg = str_replace("BACKIMG"," ", $line) ;
	}else if(strpos($line, 'DISC') !== false){
		$disc = str_replace("DISC"," ", $line) ;
	}else if(strpos($line, 'KOP') !== false){
		$kop = str_replace("KOP"," ", $line) ;
		array_push($kopjes, $kop);
	}else if(strpos($line, 'TEXTA') !== false){
		$text = str_replace("TEXTA"," ", $line) ;
		array_push($textenA, $text);
	}if(strpos($line, 'TEXTB') !== false){
		$text = str_replace("TEXTB"," ", $line) ;
		array_push($textenB, $text);
	}if(strpos($line, 'TEXTC') !== false){
		$text = str_replace("TEXTC"," ", $line) ;
		array_push($textenC, $text);
	}if(strpos($line, 'TEXTD') !== false){
		$text = str_replace("TEXTD"," ", $line) ;
		array_push($textenD, $text);
	}if(strpos($line, 'POSTIMG') !== false){
		$postImg = str_replace("POSTIMG"," ", $line) ;
	}if(strpos($line, 'EXTRA') !== false){
		$textE = str_replace("EXTRA"," ", $line) ;
		array_push($textenE, $textE);
	}else{
		array_push($leftover, $line);
	}
}

$postnum = $_GET['postnum'];
// var_dump(implode(",", $kopjes));
$kopje = $kopjes[$postnum -1];
$textA = $textenA[$postnum-1];
$textB = $textenB[$postnum -1];
$textC = $textenC[$postnum-1];
$textD = $textenD[$postnum-1];



fclose($myfile);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="style.css">
	    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	</head>
	<body>
		<div class="container-fluid p-0">		
        	<center>
	            <div class="card r" style="border:none; height: 470px; overflow: hidden;">
	            	<?php echo  "<img class=card-img-top width=100% src=img/$backImg />";?>
	                <div class="card-img-overlay card-inverse">
						<?php echo  "<img height=100% src=img/$frontImg />";?>  
	                </div>  
	            </div>
        	</center>	
	    </div>
	    <div class="container">
    		<div class="row">
 				<div class="col-lg-6">
 					<div class="m-5">
			     		<h1 class="fw-bold"><?php echo $title; ?></h1>
					    <p> <?php echo $disc; ?></p>
					    <h3><?php echo $kopje; ?></h3>
					    <p><?php echo $textA; ?></p>
					    <p><?php echo $textB; ?></p>
					    <p><?php echo $textC; ?></p>
					    <p><?php echo $textD; ?></p>
					    
					   
			     	</div>
 				</div>
 				<div class="col-lg-6 p-5">
 					<?php echo '<img src=img/'.$postImg.' class=img-fluid alt= post image>'?>
 				</div>
 			</div>
    	</div>
	    <?php include_once "footer.php";?>
	</body>
</html>