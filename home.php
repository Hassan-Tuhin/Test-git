<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tuition Media</title>
	<link type="text/css" href="style.css" rel="stylesheet" >
</head>
<body>
		<header>
			<img id="logo" src="logo.png">
			<nav>
				<a class="hsign" href="home.php">Home</a>
				<a class="hsign" href="#tuitions">Tuitions</a>
				<a class="hsign" href="">Teachers</a>
				<a class="hsign" href="">Request for Tuition</a>
				<a class="hsign" href="">Request for Tutor</a>
				<a href="login.php" class="hsign"><button class="signin">Sign in</button></a>
			</nav>
		</header>
		<div class="slideshow-container">

		  <!-- Full-width images with number and caption text -->
		  <div class="mySlides fade">
		    <div class="numbertext">1 / 3</div>
		    <img src="slider-1.jpg" style="width:100%;height: 500px;margin-left:-10px;">
		  </div>

		  <div class="mySlides fade">
		    <div class="numbertext">2 / 3</div>
		    <img src="slider-3.jpg" style="width:100%;height: 500px;margin-left:-10px;">
		  </div>

		  <div class="mySlides fade">
		    <div class="numbertext">3 / 3</div>
		    <img src="4th.jpg" style="width:100%;height: 500px;margin-left:-10px;">
		  </div>
		  
		</div>
		<br>
		<script>
			var slideIndex = 0;
			showSlides();
			function plusSlides(n) {
				showSlides(slideIndex += n);
			}
			
			function showSlides() {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none"; 
				}
				slideIndex++;
				if (slideIndex > slides.length) {slideIndex = 1}
				slides[slideIndex-1].style.display = "block"; 
				setTimeout(showSlides, 4000); // Change image every 2 seconds
			}
		</script>
		<div class="tuition">
				<p>LOOKING FOR EXPERT TUTOR??</p>
				<a href="#request_tutor" style="color:blue;font-size:30px;font-family:arial;line-height: 1.5;">Click here to submit your Tutor requirements</a> 
		</div>	
		<div class="filter">
					<h3>Recent 42 Tuition</h3>
					<p style="text-align:center;color:#53575e;font-size:20px;">Use following search box to find tuition that fits you better</p>
		</div>
		<footer>
			<div class="about_footer">
				<h4 style="color:white;">ABOUT</h4>
				<p align="justify"style="color:#b5bfce;font-family:arial;line-height: 1.5;">Tuitionmedia.com is one of the largest tuition media in Bangladesh. Which aims to provide tuition to people who are searching for tuition. We have an objective to provide highly qualified teachers To those who can't find the appropriate teachers. We have large number of tutors from different university and different subjects
				</p>
			</div>
			<div class="find_footer">
				<h4 style="padding-left:42px;">FIND US</h4>
				<ul class="footer_list">
					<li style="display: inline;padding-right:10px;"><a href="https://web.facebook.com/J.U.Jisan"target="_blank"><img src="facebook.png"></a></li>
					<li style="display: inline;padding-right:10px;"><a href="https://www.linkedin.com/in/jalal-uddin-jisan/" target="_blank"><img src="in.png"></a></li>
					<li style="display: inline;padding-right:10px;"><a href="mailto:jisan.cse16@gmail.com"target="_blank"><img src="mail.png"></a></li>
					<li style="display: inline;padding-right:10px;"><a href="https://www.instagram.com/j.u.jisan/"	target="_blank"><img src="instag.jpg"></a></li>
					<br>
					<br>
					
					<p style="color:#b5bfce;font-family:arial;line-height: 1.5;">Contact No: +880 01521-484347</p>
					<h5>Address:</h5>
					<address style="color:#b5bfce;font-family:arial;">
						Hamzarbug, Chittagong
					</address>
				</ul>
			</div>
			<hr>
			<div style="color:#b5bfce;padding-top:3%;">
				Copyrights © 2019 All Rights Reserved by <a href="home.php" style="color:#b5bfce;">JUJ Tuition Media</a>
			</div>
		</footer>
</body>
</html>