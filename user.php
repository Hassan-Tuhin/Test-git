<?php 
session_start(); 

if(!empty($_SESSION['remember'])){
	$cookie_name= $_SESSION['user'];
	$cookie_value=$_SESSION['userdata']['user'];
	setcookie('cookie_name', $cookie_value,time()+2592000);
}

if(!isset($_SESSION['userdata']['user'])){
	header("location:login.php");
	exit;
}
?>
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
				<a class="hsign" href="user.php">Home</a>
				<a class="hsign" href="#tuitions">Tuitions</a>
				<a class="hsign" href="">Teachers</a>
				<?php
					if($_SESSION['type']=="Tutor")
						echo "<a class=\"hsign\" href=\"\">Request for Tuition</a>";
					else echo "<a class=\"hsign\" href=\"input_tuition.php\">Tuition Requisition</a>";  
				?>
				
				<a style="padding-right:25px;font-size:25px;color:blue;" href=""><img src="user.jpg" style="height:20px;width:20px;"><?php echo $_SESSION['name'] . "(" . $_SESSION['type'] . ")";?></a>
				<a style="color:black;padding-right:15px;font-size:18px;" href="logout.php">Sign Out</a>
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
        <?php
        	$con= mysqli_connect('localhost','root','');
        	mysqli_select_db($con,'userregistration');
        	$tuition = " select * from tuition ";
        	$result = $con->query($tuition);
        ?>
		<div class="filter">
					<h3>Recent<?php echo ' '.$result->num_rows ; ?> Tuition</h3>
					<p style="text-align:center;color:#53575e;font-size:20px;">Use following search box to find tuition that fits you better</p>
		</div>
		<?php  
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
					?>
						<div class= "tuition_list">
							<form>
								<fieldset>
									<legend><?php echo "Tuition Id: ".$row["TUITION_ID"]; ?></legend>
									
									<p style="text-align: center;font-size:18px;">
									<span style="float:left;font-size:15px;background-color:#8ce69d;height: 18px;width:110px;"><?php echo 'Booked: '.$row['BOOKED'];?></span>
									<?php 
										echo $row["VARSITY"].' '. $row["GENDER"].' Tutor Wanted in '.$row['AREA']; 
									?>
									</p>
									<span style="font-size: 22px;">Class: <?php echo' '. $row['CLASS']; ?></span>
									<span><address style="float:right"><img src="add.jpg" height="18px" width="18px"><?php echo' '. $row['ADDRESS']?></address></span>
									<br><br>
									<span style="font-size:18px;color:#6e7570">Group: <?php echo' '.$row['STUDY']?></span>
									<span style="float: right;background-color: #77ede5;height:18px;width:130px;text-align: center;">MEDIA FEE: 70%</span>
									<span style=" margin-right:10px;float: right;background-color: #42f590;height:18px;width:130px;text-align: center;"><?php echo 'Medium: '.$row['VERSION']?></span>
									<span style=" margin-right:10px;float: right;background-color: #f5d742;height:18px;width:130px;text-align: center;"><?php echo 'Duration: '.$row['DURATION'].' hour'?></span>
									<span style=" margin-right:10px;float: right;background-color: #f57e42;height:18px;width:130px;text-align: center;"><?php echo 'Days Per Week: '.$row['DAY']?></span><br>
									<span style="font-size:18px;color:#6e7570"><?php echo 'Subject: '.$row['SUBJECT'];?></span><br>
									<span style="font-size:18px;color:#6e7570"><?php echo 'Time: '.$row['TIMES'];?></span><br>
									<span style="font-size:18px;color:#cc3333"><?php echo 'Salary: '.$row['SALARY'].' TK';?></span>
								</fieldset>
							</form>
						</div>
					<?php
				}
			}
		?>
		
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
				Copyrights © 2019 All Rights Reserved by <a href="user.php" style="color:#b5bfce;">JUJ Tuition Media</a>
			</div>
		</footer>
</body>
</html>