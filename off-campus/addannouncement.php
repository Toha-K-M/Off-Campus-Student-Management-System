<?php
include_once 'session.php';
include_once 'database.php';
?>
<?php
if(isset($_POST['submit'])){
   $date = $_POST["date"];
   $headline = $_POST["headline"];
   $news = $_POST["news"];
   $sqlInsert = "INSERT INTO announcement (date,headline,details) 
	              VALUES (:date,:head,:details)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array(':date' => $date, ':head' => $headline, ':details'=>$news));	
}
?>

<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System: Add Announcement</title>
<style>
.info{
	width: 50%;
	border:1px solid black; 
	 margin: 0 auto;
	cellpadding=2px;
}
.info01{
	margin: 0 auto;
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
		    <li><a href="about.php" style="text-decoration:none;color:white">About</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Work</a></li>
		    <li><a href="contact.php" style="text-decoration:none;color:white">Contact</a></li>
			<li><a href="myaccount.php" style="text-decoration:none;color:white">My Account</a></li>
	    </nav>
	 </div>
	<div class="content" >		
<?php
if(!isset($_SESSION['username'])):
?>
<p>You are currently not signin <a href="login.php" style="text-decoration:none;color:white"><strong>(Login)</strong></a> Not yet a member? 
<a href="signin.php" style="text-decoration:none;color:white"><strong>(Signup)</strong></a></p>

<?php else: ?>
<p>You are logged in as 
<?php
 if(isset($_SESSION['username']))
	echo '<a href="myaccount.php" style="text-decoration:none;color:white">';echo $_SESSION['name'];".</a>." 
?> 
<a href="logout.php" style="text-decoration:none;color:white"><strong>(Logout)</strong></a></p>
<?php endif ?>

</div>	 
</header>
<br/>
<?php
    if(isset($result)){
		echo $result; 
	} 
	?>
	<div clas="info01">
<form action ="addannouncement.php" method="post" >
    <table class="info"  >
	    <tr>
		    <td>Date: </td>
			<td><input type="text" value="" name="date"></td>
		</tr>
	    <tr>
		    <td>Headline: </td>
			<td><input type="text" value="" name="headline"></td>
		</tr>
        <tr>
		    <td>News: </td>
			<td><textarea type="text" value="" name="news" col="1000" ></textarea></td>
        </tr>		
    </table>
	<table class="info01">
	    <tr>	
		    <td></td>
			<td><input type="submit" value="Submit" name="submit"></td>
        </tr>
		</table>
</form>
<div>
<p><a href="index01.php">Back</a></p>
</body>
</html>
