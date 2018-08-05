<?php
  include("Database.php");
  include_once 'session.php';
  $ut = $_SESSION['usertype'];
  $username = $_SESSION['username'];
  ?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="hrrp://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:My Account</title>
<style>
.info{
	
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
if(isset($result)) 
	echo $result;
?>
<form method="post" action ="">
    <table class="info" border = "2px solid black" cellpadding="5px" cellspacing ="5px" >
	    
		

 <?php
  if($ut== "Admin")
  {
    $sqlQuery = "SELECT * FROM admin_register WHERE username=:user";
    $statement= $db->prepare($sqlQuery);
    $statement->execute(array(':user'=>$username));
    foreach ($statement as $row)
	{	
	
  	  echo "<tr>";
	  echo '<td><strong>Username: </strong></td>' ;
      echo "<td>".$row['username']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Name: </strong></td>";
      echo "<td>".$row['name']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Gender: </strong></td>";
      echo "<td>".$row['gender']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Address: </strong></td>";
      echo "<td>".$row['address']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Email: </strong></td>";
      echo "<td>".$row['email']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Starting Year: </strong></td>"; 
      echo "<td>".$row['startingyear']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>Phone: </strong></td>"; 
      echo "<td>".$row['phone']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td><strong>User Type: </strong></td>";	  
      echo "<td>".$row['usertype']."</td>";
      echo "</tr>";
	}
		if($statement -> rowCount()==1)
		{
	    $_SESSION['name']= $row['name'];
		$_SESSION['username']=$row['username'];	
		$_SESSION['gender']=$row['gender'] ;
		$_SESSION['address']=$row['address'] ;
		$_SESSION['email']=$row['email'] ;
		$_SESSION['usertype']=$row['usertype'] ;
		$_SESSION['phone']=$row['phone'] ;
		$_SESSION['startingyear']=$row['startingyear'] ;
		$_SESSION['password']=$row['password'];
		//$_SESSION['faculty']=$row['faculty'];
		}
		
   }
  
  else{
	  if($ut== "Student")
  {
    $sqlQuery = "SELECT * FROM student_register WHERE username=:user";
    $statement= $db->prepare($sqlQuery);
    $statement->execute(array(':user'=>$username));
	foreach ($statement as $row)
	{
		
  	  echo "<tr>";
	  echo '<td>Username: </td>' ;
      echo "<td>".$row['username']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Name: </td>";
      echo "<td>".$row['name']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Gender: </td>";
      echo "<td>".$row['gender']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Address: </td>";
      echo "<td>".$row['address']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Email: </td>";
      echo "<td>".$row['email']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Starting Year: </td>"; 
      echo "<td>".$row['startingyear']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>Phone: </td>"; 
      echo "<td>".$row['phone']."</td>";
	  echo "</tr>";
	  echo "<tr>";
	  echo "<td>User Type: </td>";	  
      echo "<td>".$row['usertype']."</td>";
      echo "</tr>";
	
	}  
	    	if($statement -> rowCount()==1)
			{
        $_SESSION['name']= $row['name'];
		$_SESSION['username']=$row['username'];	
		$_SESSION['gender']=$row['gender'] ;
		$_SESSION['address']=$row['address'] ;
		$_SESSION['email']=$row['email'] ;
		$_SESSION['usertype']=$row['usertype'] ;
		$_SESSION['phone']=$row['phone'] ;
		$_SESSION['startingyear']=$row['startingyear'] ;
		$_SESSION['password']=$row['password'];	
	    $_SESSION['faculty']=$row['faculty'];

			}
  }
  }
  if(isset($_POST['update'])){
	  header("location:update.php");
  }
  
	
?>

    </table>
	<table class="info">
	<tr>
          <td>
		  <input  type="submit" value="update" name="update"/>
		  
		  <!--  
		  onclick="window.location.href = 'update.php'
		  <button type="submit" name="update"><a href="update.php" style="text-decoration:none;color:black">update</a></button>
           <button type="submit" name="insert">Insert</button>
	       <input class="dis" type="button" value="Delete" onclick="window.location.href = 'Delete.php'"/>
	       <input class="dis" type="button" value="Display" onclick="window.location.href = 'display.php'"/>
	       <input class="dis1" type="button" value="Display Alphabatecally" onclick="window.location.href = 'DisplayAl.php'"/>
	       <input class="dis1" type="button" value="Display by Genre" onclick="window.location.href = 'Dis.php'"/>-->
          </td>
        </tr>
	</table>
</form>

<p><a href="index01.php">Back</a></p>
</body>
</html>
