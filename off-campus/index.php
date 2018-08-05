<?php
include_once'session.php';
include_once'database.php';
?>
<!DOCTYPE>
<html>
<head>

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
.design{
	width:30%;
	height: 20%;
	float: right;
	border: 1px solid black;

}
</style>
</head>
<body>

<header class="container">
    <div>

   <!-- <img src="" width="200" alt="" title="">	-->
	    <nav>
		    <li><h2><a href="index.php" style="text-decoration:none;color:white">NEST</a></h2><li>
		    <li><a href="index.php" style="text-decoration:none;color:white">Home</a></li>
		    <li><a href="about.php" style="text-decoration:none;color:white">About</a></li>
		    <li><a href="" style="text-decoration:none;color:white">Work</a></li>
		    <li><a href="contact.php" style="text-decoration:none;color:white">Contact</a></li>
	    </nav>
<div class="content" >		

		<?php
if(!isset($_SESSION['username'])):
?>
<p>You are currently not signin <a href="login.php" style="text-decoration:none;color:white"><strong>(Login)</strong></a> Not yet a member? 
<a href="signin.php" style="text-decoration:none;color:white"><strong>(Signup)</strong></a></p>

<?php else: ?>
<p>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['name']; 
?> 
<a href="logout.php" style="text-decoration:none;color:white"><strong>(Logout)</strong></a></p>
<?php endif ?>
</div>
    </div>
</header>

<br/>
<div id="slider">
 
    <img class="slides" src="pic/02.jpg"/> 
    <img class="slides" src="pic/03.jpg"/> 
    <img class="slides" src="pic/04.jpg"/> 
    <img class="slides" src="pic/05.jpg"/> 
    <img class="slides" src="pic/06.jpg"/> 
    <img class="slides" src="pic/01.jpg"/> 
	<button class="btn" onclick="plus(-1)" id="btn01">&#10094;</button>
	<button class="btn" onclick="plus(1)" id="btn02">&#10095;</button>
</div>
<br/>
<br/>
<div  id="nav" >
    <ul style="margin:0; padding:0; list-style:none;">
	

	    <li style="float:left;"><a class="put" href="announcement.php" style="text-decoration:none;color: white;
	width: 125px;
	text-decoration:none;
	display:block;
	text-align: center;
	padding:15px;
	text-transform:uppercase;
	font-size:15px;
	font-family:Verdan;">Announcement</a>  
	</li>
	
	    <li style="float:left;"><a class="put" href="event.php" style="text-decoration:none;color: white;
	width: 125px;
	text-decoration:none;
	display:block;
	text-align: center;
	padding:15px;
	text-transform:uppercase;
	font-size:15px;
	font-family:Verdan;"> Event</a>
	</li>  
    </ul>
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
<section class="mapsp">
   <div class="container text-center">

    <div class="row">
      <h2></h2>
        <div class="col-md-6">
          <div class="well">
          <div id="map"style="height:600px;background:"></div>
    <script>
	
	
	

	
      function initMap() {
          var i=0;
          var marker;
          var coo_name=new Array();
          var myLatLng =new Array();
          myLatLng[0]={lat: 3.974341, lng: 102.438057};
          coo_name[0]='Pahang,Malaysia';

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: myLatLng[0]
        });

        for(i=0;i<myLatLng.length;i++)
        {
          marker = new google.maps.Marker({
          position: myLatLng[i],
          map: map,
          title: coo_name[i]
        });
        }
      }
    </script>
        </div>
        </div>
        <div class="col-md-6" id="map_pera">
          <div class="well">
          
          </div>
        </div>
      </div>

   </div>
   
    


</section>
  
 
  <footer >
  <br/>
    <div id="ft">

   <!-- <img src="" width="200" alt="" title="">	-->
<nav>
<table class="footer">	
<tr><td><h2>Address</h2><td><tr/>
	    
<tr><td>Universiti Malaysia Pahang</td><td></td><td></td><td></td><td></td><td></td><td></td><td>Universiti Malaysia Pahang</td></tr>
<tr><td>26600 Pekan Pahang</td><td></td><td></td><td></td><td></td> <td></td><td></td><td>Lebuhraya Tun Razak</tr>
<tr><td>Tel: +609-4245000</td><td></td><td></td><td></td> <td></td><td></td><td></td><td>26300 Gambang, Kuantan</td></tr>
<tr><td>Fax: +609-4245055</td><td></td><td></td><td></td><td></td><td></td><td></td><td>Fax: +609-4245055</td></tr>
<tr><td>Email: pro[at]ump.edu.my</td><td><td></td><td></td><td></td></td><td></td><td></td><td> Email: pro[at]ump.edu.my</td></tr>
</table>
	 </nav>
	</footer>	
  </div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBxRRZY0e8a7o-vQTQpCCbOoVF_IzyMuM&callback=initMap">
    </script>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>