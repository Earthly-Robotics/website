<?php include_once "nav.php"; 

if ($_GET['project']=="flower")
{
	$blognum = 1;
	$myfile = fopen("flowerGolemBlog.txt", "r") or die("Unable to open file!");

}else if ($_GET['project']=="copper")
{
	$blognum = 2;
	$myfile = fopen("copperGolemBlog.txt", "r") or die("Unable to open file!");
	
}else if ($_GET['project']=="iron")
{
	$blognum = 3;
	$myfile = fopen("ironGolemBlog.txt", "r") or die("Unable to open file!");
	
}else{
	echo "no blog yet";
}

$linecount = 0;
$leftover = [];
$kopjes = [];
$texten = [];
$postimg = [];
$amountPosts = 0;

while(!feof($myfile)){
  	$line = fgets($myfile);
  	$linecount++;
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
	}else if(strpos($line, 'MAINT') !== false){
		$text = str_replace("MAINT"," ", $line) ;
		array_push($texten, $text);
	}if(strpos($line, 'MAINPI') !== false){
		$img = str_replace("MAINPI"," ", $line) ;
		array_push($postimg, $img);
	}else{
		array_push($leftover, $line);
	}
}
$amountPosts = count($kopjes);

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
	            <div id="banerr"class="card r" style="border:none; height: 50%; overflow: hidden;">
	            	<?php echo  "<img class=card-img-top width=100% src=img/$backImg />";?>
	                <div class="card-img-overlay card-inverse">
						<?php echo  "<img id=banner height=85% src=img/$frontImg />";?>  
	                </div>  
	            </div>
        	</center>	
	    </div>
	    <div class="container-fluid">
	    	<div class="container">
	    		<h1 class="text-center m-4"><?php echo $title;?> Blog </h1>
    			<hr>
			    <?php 
					if ($amountPosts != 0){
			    		for($i=0; $i< $amountPosts; $i++){
			    			echo '  <div class="row p-4">
				    					<div class="col-lg-6 m-auto">
											<img src="img/'.$postimg[$i].'" class="card-img w-50" alt="..." style="border-radius: 6px;">  	
										</div>
										<div class="col-lg-6">
											<h1>' .  $kopjes[$i] . ' </h1>
											<p>' .  $texten[$i] . '</p>   	
											<a href="blogPost.php?num= '. $blognum .' & postnum='. $a =$amountPosts -$i  .'" class="butt" style="background-color: #46c2c7; border-radius: 30px;">Go to the blog</a>	
										</div>
									</div>';
	    				}
					}
				?>	
			</div>
		</div>

	    <?php include_once "footer.php";?>
	</body>
</html>