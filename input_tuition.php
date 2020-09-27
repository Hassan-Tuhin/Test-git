<?php
	session_start();
	if(isset($_POST['submit'])){
		$con= mysqli_connect('localhost','root','');
		$gid=$_SESSION['user'];
		$contact=$_POST['contact'];
		$booked="NO";
		$varsity=$_POST['varsity'];
		$area=$_POST['area'];
		$gender=$_POST['gender'];
		$address = $_POST['address'];
		$day = $_POST['day'];
		$version = $_POST['medium'];
		$salary = $_POST['salary'];
		$clas= $_POST['class'];
		$times = $_POST['time'];
		$study = $_POST['group'];
		$duration = $_POST['duration'];
		$subject = $_POST['subject'];

		mysqli_select_db($con,'userregistration');
		$reg= " insert into tuition (guardian_id,booked,contact,varsity,area,gender,address,day,version,salary,class,times, study,duration,subject) values('$gid' , '$booked','$contact', '$varsity', '$area' , '$gender', '$address', '$day','$version', '$salary', '$clas','$times','$study','$duration', '$subject') ";
		mysqli_query($con,$reg);
		header('location:user.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Information of Tuition</title>
	<style>
		form table{
			border-radius: 8px;
			overflow: hidden;
			background-color: #e3edfc;
			width:80%;
			height: 500px;
			position: absolute;
			top:65px;
			bottom:0;
			left:0;
			right:0;
			margin:auto;
			border-collapse: separate;
			 border-spacing: 20px;
		}
		td{
			width:50%;
		}
		input[type=text],[type=password], select{
		  width: 100%;
		  padding: 8px 15px;
		  font-size:14px;
		  
     	  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}
		#submit{
			width:45%;
			padding:3px 15px;
			margin: 8px,0;
			border-radius: 10px;
			box-sizing: border-box;
			font-size:20px;
			background-color: #2e7bf7;
		}
		#submit:hover{
			background-color: #0440a0;
			color:white;
		}
		a{
			text-decoration: none;
			color: black;
			width:25%;
			padding:3px 15px;
			margin: 8px,0;
			border-radius: 10px;
			font-size:22px;
			box-sizing: border-box;
			background-color: #8db4f2;
		}
		a:hover{
			background-color: #0440a0;
			color:white;
		}
	</style>
</head>
<body>
	<div style="text-align: center;font-size:30px;color:#3178ed;">Tuition Requisition</div>
	<form action="" method="post">
		<table>
			<tr>
				<td><label>Guardian Contact No<font style="color:red;">*</font></label>
					<input type="text" name="contact" placeholder="keep contact no" required>
				</td>
				<td>
					<label>Prefered University</label>
					<input type="text" name="varsity" placeholder="Exm:KUET">
				</td>
			</tr>
			<tr>
				<td><label>Area<font style="color:red;">*</font></label>
					 <select name="area">
					 	<option value="Chittagong">Chittagong</option>
					 	<option value="Khulna">Khulna</option>
					 	<option value="Dhaka">Dhaka</option>
					 </select>
				</td>
				<td>
					<label>Prefered Gender<font style="color:red;">*</font></label>
					<select name="gender">
						<option value="Male/Lady">Male/Lady</option>
						<option value="Male">Male</option>
						<option value="Lady">Lady</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Tuition Address<font style="color:red;">*</font></label>
					 <input type="text" name="address" placeholder="keep present address" required>
				</td>
				<td>
					<label>Day Per Week<font style="color:red;">*</font></label>
					<select name="day">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Medium<font style="color:red;">*</font></label>
					 <select name="medium">
					 	<option value="Bangla">Bangla</option>
					 	<option value="English">English Version</option>
					 	<option value="British">British Curriculum</option>
					 	<option value="American">American Curriculum</option>
					 </select>
				</td>
				<td>
					<label>Salary<font style="color:red;">*</font></label>
					<input type="text" name="salary" placeholder="Exm:5000" required>
				</td>
			</tr>
			<tr>
				<td><label>Class<font style="color:red;">*</font></label>
					<input type="text" name="class" placeholder="keep class" required>
				</td>
				<td>
					<label>Prefered Time<font style="color:red;">*</font></label>
					<input type="text" name="time" placeholder="Exm:5 PM - 7 PM" value="N/A" required>
				</td>
			</tr>
			<tr>
				<td><label>Group Of Study<font style="color:red;">*</font></label>
					<select name="group">
						<option value="Not">Not Applicable</option>
						<option value="Art">Art</option>
						<option value="Science">Science</option>
						<option value="Commerce">Commerce</option>
					</select>
				</td>
				<td>
					<label>Duration<font style="color:red;">*</font></label>
					<input type="text" name="duration" placeholder="Exm:1 Hour" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Prefered Subjects<font style="color:red;">*</font></label>
					<input type="text" name="subject" placeholder="Exm:Physics, Chemistry" required>
				</td>
				<td><input type="submit" name="submit" value="Submit Requisition" id="submit">
					<a href="user.php">Cancel</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>