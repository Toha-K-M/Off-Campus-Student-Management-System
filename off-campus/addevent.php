<?php
include_once 'session.php';
include_once 'database.php';
?>
<?php
if(isset($_POST['submit'])){
   $sdate = $_POST["sdate"];
   $edate = $_POST["edate"];
   $title = $_POST["title"];
   $news = $_POST["news"];
   $sqlInsert = "INSERT INTO event (title,start,end,details) 
	              VALUES (:head,:sdate,:edate,:details)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array( ':head' => $title,':sdate' => $sdate, ':edate' => $edate,':details'=>$news));	
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
<form action ="addevent.php" method="post" >
    <table class="info" >
	  <tr>
		    <td>Title: </td>
			<td><input type="text" value="" name="title"></td>
		</tr>
	    <tr>
		    <td>Start Date: </td>
			<td><input type="text" value="" name="sdate"></td>
		</tr>
	     <tr>
		    <td>End Date: </td>
			<td><input type="text" value="" name="edate"></td>
		</tr>
        <tr>
		    <td>Details: </td>
			<td><textarea type="text" value="" name="news" col="1000" ></textarea></td>
        </tr>		
    </table>
	<table class="info01">
	    <tr >	
		    <td></td>
			<td><input type="submit" value="Submit" name="submit"></td>
        </tr>
		</table>
</form>

<p><a href="index01.php">Back</a></p>
</body>
</html>
