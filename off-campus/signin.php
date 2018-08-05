<?php
include_once 'session.php';
include_once 'database.php';
if(isset($_POST['submit'])){
	$username= $_POST['username'];
	$name= $_POST['name'];
	$gender= $_POST['gender'];
	$address= $_POST['address'];
	//$faculty= $_POST['faculty'];
	$year= $_POST['startingyear'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$ut=$_POST['role'];
	$password= $_POST['password'];
	$faculty = "FSKKP";
	
	try{
    if($ut == "Student")
	{
	$sqlInsert = "INSERT INTO temp (username,name,gender,address,startingyear,email,phone,usertype,password) 
	              VALUES (:username,:name,:gender,:address,:year,:email,:phone,:role,:password)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array(':username' => $username, ':name' => $name, ':gender' => $gender, ':address'=>$address, 
	             ':year' =>$year, ':email'=>$email, ':phone'=> $phone,':role'=>$ut, ':password'=>$password));		
	$sqlQuery = "SELECT * FROM temp WHERE username = :username AND password = :password";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':username' => $username, ':password'=> $password));	
	$result =  "<p>Registration Successful Please wait for admin approval</p>";
	}
	else{
		if($ut == "Admin")
	{
	$sqlInsert = "INSERT INTO admin_register (username,name,gender,address,startingyear,email,phone,usertype,password) 
	              VALUES (:username,:name,:gender,:address,:year,:email,:phone,:role,:password)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array(':username' => $username, ':name' => $name, ':gender' => $gender, ':address'=>$address, 
	             ':year' =>$year, ':email'=>$email,':phone'=> $phone,':role' => $ut, ':password'=>$password));	
	$sqlQuery = "SELECT * FROM admin_register WHERE username = :username AND password = :password";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':username' => $username, ':password'=> $password));	
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
		header("location: index01.php");		

	}
	else{
		$result = "<p>Error Occured!!</p>";
	    }
	  }
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
<title>Off-Campus Management System:Signup</title>
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
		    <li><a href="" style="text-decoration:none;color:white">About</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Work</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Contact</a></li>
	    </nav>
		 </div>
</header>
<br/>
<p><a href="index.php">Back</a></p>

<?php
    if(isset($result)){
		echo $result; 
	} 
	?>
<form method="post" action ="">
    <table border="1px solid black" cellpadding="2px" class="design">
	    <tr>
		    <td><strong>Username:<strong/></td>
			<td><input type="text" value="" name="username" Required></td>
		</tr>
		<tr>
		    <td><strong>Name:<strong/></td>
			<td><input type="text" value="" name="name" Required></td>
		</tr>
		<tr>
		    <td><strong>Gender:<strong/></td>
			<td><input type="radio" value="Male" name="gender">Male <input type="radio" value="Female" name="gender" Required>Female</td>
		</tr>
		<tr>
		    <td><strong>Address:<strong/></td>
			<td><input type="text" value="" name="address" Required></td>
		</tr>
		<!--<tr>
		    <td>Faculty:</td>
			<td><input type="text" value="" name="faculty"></td>
		</tr>-->
		<tr>
		    <td><strong>Starting Year:<strong/></td>
			<td><input type="text" value="" name="startingyear" Required></td>
		</tr>
		<tr>
		    <td><strong>Email:<strong/></td>
			<td><input type="text" value="" name="email" Required></td>
		</tr>
		<tr>
		    <td><strong>Phone:<strong/></td>
			<td><input type="text" value="" name="phone" Required></td>
		</tr>
		<tr>
		    <td><strong>User Type:<strong/></td>
			<td><fieldset><select name="role">
			<option value="">Select Role</option>
			<option value="Admin">Admin</option>
			<option value="Student">Student</option>
			</select></fieldset></td>
		</tr>
		<tr>
		    <td><strong>Password: <strong/></td>
			<td><input type="password" value="" name="password" Required></td>
		</tr>
		
    </table>
	<table class="design">
	<tr>
		    <td></td>
			<td><input type="submit" value="Register" name="submit" Required></td>
		</tr>
	</table>
</form>

</body>
</html>