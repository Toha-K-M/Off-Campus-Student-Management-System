<?php
include_once'session.php';
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
#about{
	width: 50%;
	border: 1px solid black;
	margin:0 auto;
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
<div id="about">
<p><h1>Contact Us</h1>

UMP Pekan<br/>

Universiti Malaysia Pahang<br/>
26600 Pekan Pahang<br/>
Tel: +609-4245000<br/>
Fax: +609-4245055<br/>
Email: pro[at]ump.edu.my<br/>
<br/>
Gambang Campus<br/>

Universiti Malaysia Pahang<br/>
Lebuhraya Tun Razak<br/>
26300 Gambang, Kuantan<br/>
Pahang Darul Makmur<br/>

 <br/>

Undergraduate<br/>
Academic Management Division (BPA), Pekan Kampus<br/>
Tel :+609-4245252<br/>
Fax :+609-4245262<br/>
Academic Management Division (BPA), Gambang Kampus<br/>
Tel: +609-549 2550<br/>
Fax: +609-549 2555<br/>
Web: http://bpa.ump.edu.my<br/>
<br/>
Postgraduate<br/>
Institute of Postgraduate Studies (IPS)<br/>
Tel: +609-549 3197 / 3198<br/>
Fax: +609-549 3190<br/>
Email: ips[at]ump.edu.my<br/>
Web: http://ips.ump.edu.my<br/>
<br/>
Lifelong Learning<br/>
UMP Advanced Education (UMP Advanced)<br/>
Tel: +609 549 3375 / 3376 / 3364<br/>
Fax: +609 549 3384<br/>
Email: info[at]ump-ae.com.my<br/>
Web: http://umpadvanced.ump.edu.my<br/>
<br/>
Research<br/>
Research & Innovation Department (JPNI)<br/>
Tel: +609-549 2656 / 2088<br/>
Fax: +609-549 3382<br/>
Email: research[at]ump.edu.my<br/>
Web: http://research.ump.edu.my<br/>
<br/>
Industry<br/>
Industry Partnership & Community Relation Office (JJIM)<br/>
Tel: +609-549 2750<br/>
Email: jjim[at]ump.edu.my<br/>
Web: http://jjim.ump.edu.my<br/>
<br/>
International<br/>
International Office (IO)<br/>
Tel: +609-549 2631<br/>
Fax: +609-549 2698<br/>
Email: io[at]ump.edu.my<br/>
Web: http://io.ump.edu.my<br/>
<br/>
Students & Alumni<br/>
Student Affairs & Alumni Department (SAffAD)<br/>
Tel: +609-549 2545 (Gambang Campus)<br/>
Tel: +609-424 5727 (Pekan Campus)<br/>
Web: http://saffad.ump.edu.my<br/>
<br/>
Vendor<br/>
Unit Perolehan, Jabatan Bendahari<br/>
Tel: +609-5492064<br/>
Fax: +609–5492066<br/>
Web: http://bendahari.ump.edu.my<br/>
<br/>
Website / Portal Security<br/>
Email: web.security[at]ump.edu.my<br/>
</p>

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