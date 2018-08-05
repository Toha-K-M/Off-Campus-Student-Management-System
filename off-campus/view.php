<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Request</title>
<style>
.design{
	margin: 0 auto;
}
.show{
	border : 1px solid black;
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
<table class="design">
<td><a href="accept.php"><input type="submit" value="Accept" name="accept" ></a></td>
			<td><a href="reject.php"><input type="submit" value="Reject" name="reject" ><a></td>
</table>			
			
<form>
  <table class="show">
 <tr class="show">
     <th class="show">Username</th>
     <th class="show">Name</th>
     <th class="show">Address</th>
     <th class="show">Gender</th>
     <th class="show">starting Year</th>
     <th class="show">Email</th>
     <th class="show">phone</th>
     <th class="show">faculty</th>
     
 </tr>
<?php
include_once 'session.php';
include_once 'database.php';
try{
	if(!isset($_POST['accept'])){

	$user=$_GET["user"];

	$sqlInsert = "SELECT * FROM temp WHERE username LIKE '%".$user."%'";
    $statement = $db->prepare($sqlInsert);	
	$statement -> execute();
	



		foreach ($statement as $row)
 {
	 echo "
	
    
	 <tr class='show'>
     <td class='show'>".$row['username']."</td>
     <td class='show'>".$row['name']."</td>
     <td class='show'>".$row['address']."</td>
     <td class='show'>".$row['gender']."</td>
     <td class='show'>".$row['startingyear']."</td>
     <td class='show'>".$row['email']."</td>
     <td class='show'>".$row['phone']."</td>
     <td class='show'>".$row['faculty']."</td>
     
 </tr>
 
 
 

</table>
</form>";
 }
        $password = $row['password'];
		$username = $row['username'];
		$name = $row['name'];
		$address = $row['address'];
		$gender = $row['gender'];
		$startingyear = $row['startingyear'];
		$email = $row['email'];
		$phone = $row['phone'];
		$faculty = $row['faculty'];
		$usertype = $row['usertype'];
		 
		 $_SESSION['name']= $name;
		$_SESSION['username']=$username;	
		$_SESSION['gender']=$gender;	
		$_SESSION['address']=$address;	
		$_SESSION['email']=$email;	
		$_SESSION['startingyear']=$startingyear;	
		$_SESSION['phone']=$phone;
		$_SESSION['usertype']=$usertype;
		$_SESSION['password']=$password;
		$_SESSION['faculty']=$faculty;
	}
	
else
{
	
 	
}
	}
	catch(PDOException $ex){
		$result = "<p>An error occured".$ex->getMessage()."</p>";
	}

?>

<?php
    if(isset($result)){
		echo $result; 
	} 
	?>

<p><a href="request.php">Back</a></p>
</body>
</html>