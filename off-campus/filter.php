<?php
include_once'session.php';
include_once'database.php';
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="hrrp://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.php"/>
<title>Off-Campus Management System:Home</title>
<style>
#slider{
    border: 1px solid black;
	margin: 0 auto;
	width: 80%;
	height: 400px;
	position: relative;
}
#slider>img{
	position: absolute;
    width: 100%;
    height: 100%	
}
#slider>.btn{
	position: absolute;
	width: 50px;
	height:50px;
	border: none;
	border-radius: 25px;
	top: 200px;
	background: black;
	color: white;
	font-size: 20px;
}

#slider>#btn02{
	position:relative;
	float: right;
}
#nav{
	width: 1100px;
	background-color :#06303C;
	margin: auto;
	overflow: auto;
}
#nav>.put{
	
}
.design{
	width:50%;
	height: 30%;
	border: 1px solid black;
	margin: 0 auto;
	margin-bottom : 50px;
	margin-top : 50px;
}
.des{
	color:  #66d9ff;
}
body{
	font-family: "open Sans", sans-serif;
margin: 0;

}

 table,tr,th,td
 {
    border: 1px  solid black;
	border-collapse:collapse;
	font-size:18px;
	margin: 0 auto;
 }
.search{
}


a{text-decoration:none;}
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
    </div>
</header>

<br/>


<div id="filter">
<form method="post" action="filter.php">
<h2 style="margin-left:200px">Search by location</h2>
   <input style="margin-left:200px" type="text" name="valuesearch"  placeholder="Value to search">
   <input type="submit" name="search" value="Filter"><br><br>
   <h2 style="margin-left:200px">Search by faculty</h2>
   <input style="margin-left:200px" type="text" name="valuesearch01"  placeholder="Value to search">
   <input  type="submit" name="faculty" value="Filter"><br><br>
     <h2 style="margin-left:200px">Search by year</h2>
   <input style="margin-left:200px" type="text" name="valuesearch02"  placeholder="Value to search">
   <input " type="submit" name="year" value="Filter"><br><br>
<table >
 <tr>
     <th>Username</th>
     <th>Name</th>
     <th>Address</th>
     <th>Gender</th>
     <th>starting Year</th>
     <th>Email</th>
     <th>phone</th>
     <th>faculty</th>
     
 </tr>
 <?php
 $row=null;

 
if(isset($_POST['search']))	 
  {
  $valuesearch=$_POST['valuesearch'];
  
  $query="SELECT * FROM student_register WHERE address LIKE '%".$valuesearch."%'";
  
    $statement = $db->prepare($query);	
	$statement -> execute();	
	
  }
  else if(isset($_POST['faculty']))	 
  {
  $valuesearch=$_POST['valuesearch01'];
  
  $query="SELECT * FROM student_register WHERE faculty LIKE '%".$valuesearch."%'";
  
    $statement = $db->prepare($query);	
	$statement -> execute();	
	
  }
   else if(isset($_POST['year']))	 
  {
  $valuesearch=$_POST['valuesearch02'];
  
  $query="SELECT * FROM student_register WHERE startingyear LIKE '%".$valuesearch."%'";
  
    $statement = $db->prepare($query);	
	$statement -> execute();	
	
  }
  else
  {

	 $query="SELECT * FROM student_register";
	    $statement = $db->prepare($query);	
	$statement -> execute();
  }
 
 
	foreach ($statement as $row)
 {
	 echo "
	

	 <tr>
     <td>".$row['username']."</td>
     <td>".$row['name']."</td>
     <td>".$row['address']."</td>
     <td>".$row['gender']."</td>
     <td>".$row['startingyear']."</td>
     <td>".$row['email']."</td>
     <td>".$row['phone']."</td>
     <td>".$row['faculty']."</td>
     
 </tr>";
 }
 
 ?>

</table>
</form>
</div>
</body>
<script>
    var index=1;
	
	function plus(n){
		index= index+ n;
		show(index);
	}
	show(1);
	function show(n){
		var i;
		var x= document.getElementsByClassName("slides");
		//alert (x.length);
		if(n > x.length){
			index = 1;
		}
		if(n < 1){
			index = x.length;
		}
		for(i=0; i < x.length; i++){
			x[i].style.display ="none";
		}
		x[index-1].style.display ="block";
	}
	autoSlide();
	function autoSlide(){
		var i;
		var x = document.getElementsByClassName("slides");
		for(i=0; i < x.length; i++){
			x[i].style.display ="none";
		}
			if(index > x.length){
			index = 1;
		}
		x[index-1].style.display ="block";
        index++;
		setTimeout(autoSlide,2000);
	}
</script>
</html>


