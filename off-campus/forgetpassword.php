<?php
include_once 'session.php';
include_once 'database.php';
if(isset($_POST['reset'])){
	$user=$_POST['username'];
	$email=$_POST['email'];
    $pass = $_POST['password'];
	$newpass = $_POST['newpassword'];
	$ut = $_POST['role'];
	
	if($pass != $newpass){
		$result= "<p>New password does not match with confirm password</p>";
	}
	else{
		try{
			if($ut == "Admin"){
				$sqlQuery = "SELECT email FROM admin_register WHERE username=:username AND email = :email";
			$statement= $db->prepare($sqlQuery);
			$statement->execute(array(':username'=>$user,':email'=> $email));
			if($statement->rowCount()==1){
			$sqlUpdate = "UPDATE admin_register SET password = :password where username=:username AND email = :email";
			$statement= $db->prepare($sqlUpdate);
			$statement->execute(array(':username' => $user,':password'=> $newpass,':email'=> $email));				
			$result = "<p>Password Reset Successfully!!</p>";
			header("location:index.php");
			}
			else{
				$result = "<p>Email address does not exist!!</p>";
			}
			}
			else{
				if($ut == "Student"){
				$sqlQuery = "SELECT email FROM student_register WHERE username=:username AND email = :email";
			$statement= $db->prepare($sqlQuery);
			$statement->execute(array(':username'=>$user,':email'=> $email));
			if($statement->rowCount()==1){
			$sqlUpdate = "UPDATE student_register SET password = :password where username=:username AND email = :email";
			$statement= $db->prepare($sqlUpdate);
			$statement->execute(array(':username' => $user,':password'=> $newpass,':email'=> $email));				
			$result = "<p>Password Reset Successfully!!</p>";
			header("location:index.php");			
			}
			else{
				$result = "<p>Email address does not exist!!</p>";
			}
			}
			}
			
		}catch(PDOException $e){
			$result = "<p>An error occured!!".$e->getMessage()."</p>";
			
		}
	}
}
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Forget Password</title>
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
<?php
if(isset($result)) 
	echo $result;
?>
<form method="post" action ="">
    <table>
	   <tr>
		    <td>User Type:</td>
			<td><fieldset><select name="role">
			<option value="">Select Role</option>
			<option value="Admin">Admin</option>
			<option value="Student">Student</option>
			</select></fieldset></td>
		</tr>
	    <tr>
		    <td>Username:</td>
			<td><input type="text" value="" name="username" Required></td>
		</tr>
	    <tr>
		    <td>Email:</td>
			<td><input type="text" value="" name="email" Required></td>
		</tr>
		<tr>
		    <td>Password:</td>
			<td><input type="password" value="" name="password" Required></td>
		</tr>
		<tr>
		    <td>Confirm Password:</td>
			<td><input type="password" value="" name="newpassword" Required></td>
		</tr>
		<tr>
		    <td></td>
			<td><input type="submit" value="Reset" name="reset" ></td>
		</tr>
    </table>
</form>
<p><a href="login.php">Back</a></p>
</body>
</html>