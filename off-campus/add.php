<?php
include_once 'session.php';
include_once 'database.php';
?>
<?php
if(isset($_POST['upload'])){
	$target = "images/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$text=$_POST['text'];
	$sqlInsert ="INSERT INTO advertise (photo,text) VALUES ('$image','$text')";
	$statement = $db->prepare($sqlInsert);
	$statement-> execute();	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "Image Uploaded Successfully";
	}
	else{
		$msg="Problem loading image";
	}
}
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="hrrp://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Signup</title>
<style>
#up{
	width: 50%;
	margin: 20px auto;
	border: 1px solid black;
}
form{
	width: 50%;
	margin: 20px auto;	
}
form div{
	margin-top: 5px;
}
#img_div{
	width: 80%;
	padding: 5px;
	margin: 15px auto;
	border: 1px solid black;
}
#img_div:after{
	content: "";
	display: block;
	clear: both;
}
img{
	float: left;
	margin: 5px;
	width: 300px;
	height: 140px;
}
</style>
</head>
<body>
<header class="container">
    <div>

   <!-- <img src="" width="200" alt="" title="">	-->
	    <nav>
		    <li><h2><a href="index01.php" style="text-decoration:none;color:white">NEST</a></h2><li>
		    <li><a href="index01.php" style="text-decoration:none;color:white">Home</a></li>
		    <li><a href="" style="text-decoration:none;color:white">About</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Work</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Contact</a></li>
	    </nav>
		 </div>
</header>
<br/>



<div id="up">
<form method="post" action ="add.php" enctype="multipart/form-data">
  <input type="hidden" name="size" value="1000">
  
        <input type="file" name="image">
 
        <textarea name="text" cols="40" rows="4" placeholder="About the image.."></textarea>
 
        <input type="submit" name="upload" value="Upload">
  
</form>
</div>

</body>
</html>
<?php
   $sqlInsert ="SELECT * FROM advertise";
	$statement = $db->prepare($sqlInsert);
	$statement-> execute(); 
	while ($row = $statement -> fetch()){
		echo "<div id='img_div'>";
		    echo "<img src='images/".$row['photo']."'>";
			echo "<p>".$row['text']."</p>";
		 echo "</div>";
	}
	
?>