<?php
include_once 'session.php';
include_once 'database.php';
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Login</title>
<style>
.fee{
	width: 40%;
	height: 80%;
	border: 1px solid black;
    border-collapse:collapse;
	margin: 0 auto;
	font: 25px;
	
}
.br{
	border: 1px solid black;
}
.fee01{
	width: 50%;
	 border: 1px  solid black;
	 border-collapse:collapse;
 	margin: 0 auto;
	font-size:18px;
	margin: 0 auto;
}
.fee02{
	width: 40%;
	 border: 1px  solid black;
	 border-collapse:collapse;
 	margin: 0 auto;
	font-size:18px;
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
</header><?php
if(isset($result)) 
	echo $result;
?>
<br/>
<br/>
<form method="post" action ="finance.php">
    <table style="margin: 0 auto;">
       <tr>
		    <td></td>
			<td><input type="submit" value="View Record" name="vr" ></td>
		</tr> 
</table>
	</form>	

<?php

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $name = $_POST['name'];
    $ut = $_POST['role'];
    $date = $_POST['date'];
	$amount = $_POST['amount'];
	$sqlInsert = "INSERT INTO financial (username,name,date,amount) 
	              VALUES (:username,:name,:date,:amount)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array(':username' => $user, ':name' => $name, ':date' => $date, ':amount'=> $amount));
}

else{
	 echo '
	
		 <form  method="post" action="finance.php">
		 	 <table class="fee01">
		 <h2 style="margin-left:550px">Search by Month or Year</h2>
   <input style="margin-left:550px" type="text" name="valuesearch"  placeholder="Username to search">
   <input type="submit" name="search" value="Search">
   <br/><br/>
		 
		';
	 if(isset($_POST['search']))	 
  {
  $valuesearch=$_POST['valuesearch'];
  
  $query="SELECT * FROM financial WHERE date LIKE '%".$valuesearch."%'";
  
    $statement = $db->prepare($query);	
	$statement -> execute();	
	echo' <tr class="fee01">
     <th class="fee01">Username</th>
     <th class="fee01">Name</th>
     <th class="fee01">Date of Payment</th>
     <th class="fee01">Amount</th>
	 </tr>';
 foreach ($statement as $row)
 {
	 echo "
	

	 <tr class='fee01'>
     <td class='fee01'>".$row['username']."</td>
     <td class='fee01'>".$row['name']."</td>
     <td class='fee01'>".$row['date']."</td>
     <td class='fee01'>".$row['amount']."</td>   
 </tr><br/>";
 }
	
  }else{
	  	if(isset($_POST['vr'])){
		$query="SELECT * FROM financial";
	$statement = $db->prepare($query);	
	$statement -> execute();
		echo' <tr class="fee01">
     <th class="fee01">Username</th>
     <th class="fee01">Name</th>
     <th class="fee01">Date of Payment</th>
     <th class="fee01">Amount</th>
	 </tr>';

 foreach ($statement as $row)
 {
	 echo "
	

	 <tr class='fee01'>
     <td class='fee01'>".$row['username']."</td>
     <td class='fee01'>".$row['name']."</td>
     <td class='fee01'>".$row['date']."</td>
     <td class='fee01'>".$row['amount']."</td>   
 </tr><br/>";
 }
  }
  }
 
 }

?>


</table>
</form>
<br/>	
<br/>
<h2 align="center">Add Membership Fee</h2>	
<form method="post" action ="finance.php">
    <table class="fee">
	    <tr class="br">
		    <td>Username:</td>
			<td><input type="text" value="" name="username" Required></td>
		</tr>
		<tr class="br">
		    <td>Name:</td>
			<td><input type="text" value="" name="name" Required></td>
		</tr>
		<tr class="br">
		    <td>User Type:</td>
			<td><select name="role" Required>
			<option value="">Select Role</option>
			<option value="Admin">Admin</option>
			<option value="Student">Student</option>
			</select></td>
		</tr >
		<tr class="br">
		   <td>Date of Payment:</td>
			<td><input type="text" value="" name="date" Required></td>  
		</tr>
		<tr class="br">
		   <td>Amount:</td>
			<td><input type="text" value="" name="amount" Required></td>  
		</tr>
	
    </table>
<table style="margin: 0 auto;">
        <tr>
		    <td></td>
			<td><input type="submit" value="Submit" name="submit" ></td>
		</tr>
		
    </table>
	</form>
<br/>	
<br/>	

<p><a href="index01.php">Back</a></p>
</body>
</html>