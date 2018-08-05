<?php
include_once 'session.php';
include_once 'database.php';
        $name= $_SESSION['name'];
		$username= $_SESSION['username'];	
		$gender= $_SESSION['gender'] ;
		$address= $_SESSION['address'];
		$email= $_SESSION['email'];
		$usertype= $_SESSION['usertype'];
		$phone= $_SESSION['phone'];
		$startingyear= $_SESSION['startingyear'];
		$password= $_SESSION['password'];
		if($usertype == "Student")
		{
            $faculty = $_SESSION['faculty'];		
		}
if(isset($_POST['update'])){

	try{
	if($usertype == "Admin")
	{
	$un=$_POST['username'];
	$n=$_POST['name'];
	$g=$_POST['gender'];
	$a=$_POST['address'];
	$e=$_POST['email'];
	$ut=$_POST['usertype'];
	$p= $_POST['phone'];
	$sy= $_POST['startingyear'];
	//$f=$_POST['faculty'];
	    $sqlInsert = "UPDATE admin_register SET name=:name,gender=:gender,address=:address,startingyear=:year,
	    email=:email,phone=:phone,usertype=:role WHERE username=:username ";
				  
        $statement = $db->prepare($sqlInsert);
	    $statement-> execute(array( ':name' => $n, ':gender' => $g, ':address'=>$a,':year' =>$sy, ':email'=>$e, ':phone'=> $p,':role'=>$ut,':username'=>$un));			
	   
	   $sqlQuery = "SELECT * FROM admin_register WHERE username = :username ";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':username' => $un));
	}
    else{
	    if($usertype == "Student")
	    {
	$un=$_POST['username'];
	$n=$_POST['name'];
	$g=$_POST['gender'];
	$a=$_POST['address'];
	$e=$_POST['email'];
	$ut=$_POST['usertype'];
	$p= $_POST['phone'];
	$sy= $_POST['startingyear'];
	$f=$_POST['faculty'];
	        $sqlInsert = "UPDATE student_register SET name=:name,gender=:gender,address=:address,startingyear=:year,
	                    email=:email,faculty=:fac,phone=:phone,usertype=:role WHERE username =:user ";
				  
            $statement = $db->prepare($sqlInsert);
	        $statement-> execute(array( ':name' => $n, ':gender' => $g, ':address'=>$a,':year' =>$sy, ':email'=>$e,':fac'=>$f, ':phone'=> $p,':role'=>$ut,':user'=>$un));			 
           $sqlQuery = "SELECT * FROM student_register WHERE username = :username ";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':username' => $un));	   
	   }	
	    }
    while ($row = $statement -> fetch()){
	$pass = $row['password'];
	$user = $row['username'];
	$n = $row['name'];
	$usertype = $row['usertype'];
	}
	if($statement -> rowCount()==1)
	{
        $_SESSION['name']= $n;
		$_SESSION['username']=$user;	
		$_SESSION['usertype']=$usertype ;
		//header("location: myaccount.php");	
        $result ="<p>Updated Successfully</p>";		
	}else{
		$result = "<p>Error Occured!!</p>";
	}		
	}
	catch(PDOException $ex){
		$result = "<p>An error occured".$ex->getMessage()."</p>";
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
<title>Off-Campus Management System: Update Information</title>
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
    if(isset($result)){
		echo $result; 
	} 
	?>
<form method="post" action ="">
    <table class="info" border="1px solid black" cellpadding="2px">
	    <tr>
		    <td>Username:</td>
			<td><input type="text" value="<?php echo $username; ?>" readonly name="username"></td>
		</tr>
		<tr>
		    <td>Name:</td>
			<td><input type="text" value="<?php echo $name; ?>" name="name" ></td>
		</tr>
		<tr>
		    <td>Gender:</td>
			<td><input type="text" value="<?php echo $gender ; ?>" name="gender" ></td>
		</tr>
		<tr>
		    <td>Address:</td>
			<td><input type="text" value="<?php echo $address; ?>" name="address" ></td>
		</tr>
<?php if ($usertype == "Student")
		echo '<tr>
		    <td>Faculty:</td>
			<td><input type="text" value="FSKKP" name="faculty"></td>
		     </tr>';
 ?> 		
		<tr>
		    <td>Starting Year:</td>
			<td><input type="text" value="<?php echo $startingyear; ?>" name="startingyear" ></td>
		</tr>
		<tr>
		    <td>Email:</td>
			<td><input type="text" value="<?php echo $email; ?>" name="email" ></td>
		</tr>
		<tr>
		    <td>Phone:</td>
			<td><input type="text" value="<?php echo $phone; ?>" name="phone"></td>
		</tr>
		<tr>
		    <td>User Type:</td>
			<td><input type="text" value="<?php echo $usertype; ?>" name="usertype"></td>
		</tr>
	</table>	
	<table class="info">	
		<tr>
		    <td></td>
			<td><input type="submit" value="Update" name="update"></td>
		 </tr>
         <tr>
           <td></td>		 
			<td><input class="" type="button" value="Change Password" onclick="window.location.href = 'forgetpassword.php'"/></td>
		</tr>
    </table>
</form>
<p><a href="index01.php">Back</a></p>
</body>
</html>
