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
<p><h2>About</h2><br/>Some considerations in comparing on-campus and off-campus housing:

Finding a good place to live takes time, but remember there are a lot of choices. If you're wondering whether you should live on-campus or on-campus, here are some things to consider:
<br/>
1) Availability:
Space in the UW residence halls (dormitories) is limited. If you want to live on campus, you should apply to a residence hall as soon as you can. Generally, the best, least expensive, and most convenient places to live near the university are often filled 2-3 months before a new quarter begins.
<br/>

2) Convenience:
If you live in residence hall, you will only need to walk a short distance to classes. Off-campus apartments can be either near or far to campus, but you can usually walk, bike, or bus to the university from many apartments in the University District. There are several other neighborhoods with good buses to the University, including Green Lake, Wallingford, and Ravenna.
<br/>

3) Furniture:
Residence hall rooms come with furniture (beds, desks, chairs, closets, etc.) They also have free cable tv and internet access. Off-campus housing may be furnished or unfurnished, and you may need to set up your own telephone, internet, and utilities.
<br/>

4) Food:
Some residence halls have only limited access to kitchens, and others have in-unit kitchens if you want to cook for yourself. Most residence hall rooms come with a required "dining plan," with a range of levels you can choose from depending on your needs. Choices range from salad bars and sandwiches, to pizza and international food. If you live off-campus, you can cook for yourself - this can be cheaper, healthier, and more flexible than on-campus dining. Please remember that eating at restaurants can become expensive if you do it a lot!
<br/>

5) Condition:
Residence halls are clean and well-maintained; some are brand new or have been open only one or two years. Cheaper off-campus apartments can vary in quality; however, most can be made comfortable. Before signing a contract (lease) for an apartment, make sure to walk around with the landlord and write down any repairs needed for their information and for yours. Make sure the place you want to rent is clean and has everything working well.
<br/>

6) Privacy:
Residence halls house hundreds of students, so sometimes it can become noisy. Most residence hall rooms are shared with at least one other person, so you will need to make adjustments and be flexible. However, living in the halls does provide a social atmosphere and the chance to meet friends. If you live off-campus in a room in a shared house, you will also have several people living in the house with you. Living in an off-campus apartment may be quieter, more private, and you can also have more choices about how you live.
<br/>

7) Legal Obligations:
Contracts for both residence halls and apartments are legally binding documents. Residence hall contracts are for the academic year, but you can leave early by paying an extra fee. Apartment contracts (leases) are more difficult to break; however, you choose the length of a lease before you sign it. Talk about this with your landlord or with Student Legal Services before you sign a lease.
<br/>

8) Cost:
Residence hall costs for room and meals are usually similar to apartment costs off campus. Depending on the neighborhood, you may be able to rent inexpensive off-campus housing with other students and share food, rent, and other costs.
<br/>

9) Living with a Roommate:
Sharing room or apartment with people can be an interesting experience. To have a good living situation, you should be open and communicate honestly with your roommates. It is a good idea to talk about issues such as privacy, using the phone, schedules, study and social habits, food, chores, cleaning, and finances before problems arise</p>
<br/>

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