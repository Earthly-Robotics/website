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
$texten = [];
$postImgs = [];

$amountTexts = 0;
$amountPictures = 0;

$postnum = $_GET['postnum'];
$var = "SP".$postnum;
$var2 = "EP" .$postnum;

//echo 'POSTNUM'.$postnum;

while(!feof($myfile)){
  	$line = fgets($myfile);
  	//echo 'BBB'. $line;
  	if (strpos($line, 'TITLE') !== false) {
    	$title = str_replace("TITLE"," ", $line) ;
	}else if(strpos($line, 'FRONTIMG') !== false){
		$frontImg = str_replace("FRONTIMG"," ", $line) ;
	}else if(strpos($line, 'BACKIMG') !== false){
		$backImg = str_replace("BACKIMG"," ", $line) ;
	}else if(strpos($line, 'DISC') !== false){
		$disc = str_replace("DISC"," ", $line) ;
	}

	if(strpos($line, $var) !==false){
		while(strpos($line,$var2)!==true){
			$linee = fgets($myfile);
			if(strpos($linee, 'MAINT') !== false){
				$mtext = str_replace("MAINT"," ", $linee) ;
				array_push($texten,$mtext);	
			}else if(strpos($linee, 'TEXT') !== false){
				$text = str_replace("TEXT"," ", $linee) ;
				array_push($texten,$text);	
			}else if(strpos($linee, 'POSTIMG') !== false){
				$postImg = str_replace("POSTIMG"," ", $linee) ;
				array_push($postImgs,$postImg);	
			}else if(strpos($linee, 'MAINPI') !== false){
				$postImgm = str_replace("MAINPI"," ", $linee) ;
				array_push($postImgs,$postImgm);	
			}else if (strpos($linee, 'KOP')!==false) {
				$kop = str_replace("KOP"," ", $linee) ;
			} else if(strpos($linee, $var2)!==false){
				break;
			}
		}
		$amountTexts = count($texten);
		$amountPictures = count($postImgs);
		//echo " texts: " . $amountTexts . " pics: " . $amountPictures;
		break;
	}
}

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
					    <h3><?php echo $kop; ?></h3>
					    <?php 
					    	for($i=0; $i< $amountTexts; $i++){
					    		echo '<p>'.$texten[$i].'</p>';
					   	 	}
					    ?>
					    
					    
					   
			     	</div>
 				</div>
 				<div class="col-lg-6 p-5">
 					<?php 
 						for($i=0; $i< $amountPictures; $i++){
					    	echo '<img src=img/'.$postImgs[$i].' class=img-fluid alt= post image>';
					   	}
 						
 					?>
 				</div>
 			</div>
    	</div>
	    <?php include_once "footer.php";?>
	</body>
</html>