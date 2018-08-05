<?php
include_once 'session.php';
include_once 'database.php';
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
	$ut = $_POST['role'];
	
	if($ut == "Admin")
	{
		$sqlQuery = "SELECT * FROM admin_register WHERE username = :username AND password = :password";
	    $statement = $db->prepare($sqlQuery);
	    $statement->execute(array(':username' => $user, ':password'=> $pass));
	}
	else if($ut == "Student")
	    {
		    $sqlQuery = "SELECT * FROM student_register WHERE username = :username AND password = :password";
	        $statement = $db->prepare($sqlQuery);
	        $statement->execute(array(':username' => $user, ':password'=> $pass));
	    
	    }
	else{
		echo "Select user type";
	}	
	
	
	
	while ($row = $statement -> fetch()){
		$password = $row['password'];
		$username = $row['username'];
		$name = $row['name'];
		$usertype = $row['usertype'];
	}
	/*
	echo $row['password'];
	echo "db er ta upore";
	echo $pass;
	echo "input disi eta";
	if(password_verify($pass, $password))
	{
		$_SESSION['username']= $user;
		header("location: index.php");		
	}else{
		$result = "<p>Invalid Username or Password</p>";
	}
	*/

	if($statement -> rowCount()==1)
	{ 
		$_SESSION['name']= $name;
		$_SESSION['username']=$username;
		$_SESSION['usertype']=$usertype;
		header("location: index01.php");		
	}else{
		$result = "<p>Invalid Username or Password</p>";
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
<style>
.design{
	margin: 0 auto;
}
</style>
<title>Off-Campus Management System:Login</title>
</head>
<body>
<header class="container">
    <div>

   <!-- <img src="" width="200" alt="" title="">	-->
	    <nav>
		  <li><h2><a href="index.php" style="text-decoration:none;color:white">NEST</a></h2><li>
		    <li><a href="index.php" style="text-decoration:none;color:white">Home</a></li>
		    <li><a href="" style="text-decoration:none;color:white">About</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Work</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Contact</a></li>
	    </nav>
		 </div>
</header><br/><br/>
<?php
if(isset($result)) 
	echo $result;
?>
<form method="post" action ="">
    <table border="1px solid black" cellpadding="2px" class="design">
	    <tr>
		    <td>Username:</td>
			<td><input type="text" value="" name="username" Required></td>
		</tr>
		<tr>
		    <td>Password:</td>
			<td><input type="password" value="" name="password" Required></td>
		</tr>
		<tr>
		    <td>User Type:</td>
			<td><select name="role" Required>
			<option value="">Select Role</option>
			<option value="Admin">Admin</option>
			<option value="Student">Student</option>
			</select></td>
		</tr>
    </table>
	<table class="design">
	<tr>
		    <td></td>		    
			<td><p><a href="forgetpassword.php">Forget Password?</a></p></td>
		</tr>
		<tr>
		    <td></td>
			<td><input type="submit" value="Login" name="login" ></td>
		</tr>
    </table>
</form>
<p><a href="index.php">Back</a></p>
</body>
</html>