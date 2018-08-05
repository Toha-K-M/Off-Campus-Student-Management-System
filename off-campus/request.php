<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Request</title>
<style>
.design{
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
<?php
include_once 'session.php';
include_once 'database.php';


try{

	
	$sqlInsert = "SELECT * FROM temp";
    $statement = $db->prepare($sqlInsert);	
	$statement -> execute();

    echo '<form method="get" action ="view.php">
    <table border="1px solid black" cellpadding="2px" class="design">
	<tr>
	    
	    <td>Username</td>
		
	</tr>';
	$i=0;
	foreach ($statement as $row)
	{
		$user = $row['username'];
	  echo '<tr>
			<td><a href=" "><input type="submit" name="user" value='.$user.'></td>
			
		</tr>';
	

	}

	   
      echo '</table>
	  </form>';
	
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
<p><a href="index01.php">Back</a></p>
</body>
</html>