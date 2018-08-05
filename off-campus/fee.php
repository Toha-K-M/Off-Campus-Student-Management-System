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
#up{
	width: 50%;
	margin: 20px auto;
	border: 1px solid black;
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
<form method="post" action ="fee.php">
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
	$year = $_POST['nyear'];
	$amount = $_POST['amount'];
	$sqlInsert = "INSERT INTO fee (username,name,date,years,amount) 
	              VALUES (:username,:name,:date,:year,:amount)";
				  
    $statement = $db->prepare($sqlInsert);
	$statement-> execute(array(':username' => $user, ':name' => $name, ':date' => $date, ':year'=>$year, ':amount'=> $amount));
}

else{
	 echo '
	
		 <form  method="post" action="fee.php">
		 	 <table class="fee01">
		 <h2 style="margin-left:550px">Search by Username</h2>
   <input style="margin-left:550px" type="text" name="valuesearch"  placeholder="Username to search">
   <input type="submit" name="search" value="Search">
   <br/><br/>
		 
		';
	 if(isset($_POST['search']))	 
  {
  $valuesearch=$_POST['valuesearch'];
  
  $query="SELECT * FROM fee WHERE username LIKE '%".$valuesearch."%'";
  
    $statement = $db->prepare($query);	
	$statement -> execute();	
	echo' <tr class="fee01">
     <th class="fee01">Username</th>
     <th class="fee01">Name</th>
     <th class="fee01">Date of Payment</th>
     <th class="fee01">Number of Years</th>
     <th class="fee01">Amount</th>
	 </tr>';
 foreach ($statement as $row)
 {
	 echo "
	

	 <tr class='fee01'>
     <td class='fee01'>".$row['username']."</td>
     <td class='fee01'>".$row['name']."</td>
     <td class='fee01'>".$row['date']."</td>
     <td class='fee01'>".$row['years']."</td>
     <td class='fee01'>".$row['amount']."</td>   
 </tr><br/>";
 }
	
  }else{
	  	if(isset($_POST['vr'])){
		$query="SELECT * FROM fee";
	$statement = $db->prepare($query);	
	$statement -> execute();
		echo' <tr class="fee01">
     <th class="fee01">Username</th>
     <th class="fee01">Name</th>
     <th class="fee01">Date of Payment</th>
     <th class="fee01">Number of Years</th>
     <th class="fee01">Amount</th>
	 </tr>';

 foreach ($statement as $row)
 {
	 echo "
	

	 <tr class='fee01'>
     <td class='fee01'>".$row['username']."</td>
     <td class='fee01'>".$row['name']."</td>
     <td class='fee01'>".$row['date']."</td>
     <td class='fee01'>".$row['years']."</td>
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
<h2 align="center">Add Maintenance Fee</h2>	
<form method="post" action ="fee.php">
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
		   <td>Number of Year:</td>
			<td><input type="text" value="" name="nyear" Required></td>  
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
<!--<form enctype="multipart/form-data" action="fee.php" method="" class="fee02">
Browse for file to Upload: <br>
<input name="file" type="file" id="file" size="80"><br>
<input type="submit" id="button" name="button" value="Upload the File">	
</form>	-->
<div id="up">
<form method="post" action ="fee.php" enctype="multipart/form-data">
  <input type="hidden" name="size" value="1000">
  <div>
        <input type="file" name="image">
  </div>
  <div>
        <textarea name="text" cols="40" rows="4" placeholder="About the image.."></textarea>
  </div>
  <div>
        <input type="submit" name="upload" value="Upload">
  </div>
</form>
</div>
	
<?php
/*if(isset($_POST['button'])){
	$fileres="";
	if($FILES["file"]["error"]>0)
	{
		$fileres .="No File Up;oaded or Invalid File";
		$fileres .="Error code:".$FILES["file"]["error"]."<br>";
		
	}
	else{
		$fileres .=
		"Upload:" . $_FILES["file"]["name"]."<br>" .
		"Type:" . $_FILES["file"]["type"]."<br>" .
		"Size:" . ($_FILES["file"]["size"]/1024)."kb<br>" .
		"Temp File:" . $_FILES["file"]["tmp_name"]."<br>" ;
		
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"full/path/on/off-campus/file".$_FILES["file"]["name"]);
		$file_result .= "File Uploaded Successfully";	
	}
}*/
if(isset($_POST['upload'])){
	$target = "file/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$text=$_POST['text'];
	$sqlInsert ="INSERT INTO proof (photo,text) VALUES ('$image','$text')";
	$statement = $db->prepare($sqlInsert);
	$statement-> execute();	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "Image Uploaded Successfully";
	}
	else{
		$msg="Problem loading image";
	}
}
?>
<p><a href="index01.php">Back</a></p>
</body>
</html>