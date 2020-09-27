<?php
	session_start();
	if(isset($_POST['submit'])){
		$con = mysqli_connect('localhost','root','');

		mysqli_select_db($con,'userregistration');
		$type = $_POST['type'];
		if($type=="Tutor"){
			$name = $_POST['name'];
			$university = $_POST['university'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$con_pass = $_POST['confirm'];
			$edu_background = $_POST['background'];
			$department = $_POST['department'];
			$place = $_POST['place'];

			$s = " select *from user_tutor where phone = '$phone'";

			$result = mysqli_query($con, $s);

			$num = mysqli_num_rows($result);
			if($password!=$con_pass){
				$msg1="<span style='color:red'>*Password not matched</span>";
				//header('location:register.php');
			}
			elseif($num == 1){
				$msg2="<span style='color:red'>*Number Already Taken</span>";
				//header('location:register.php');
			}
			else{
				$reg= " insert into user_tutor values('$name' , '$university' , '$phone' , '$password' , '$con_pass' , '$edu_background' , '$department' , '$place')";
				mysqli_query($con, $reg);
				$msg3=" Registration Successfull";
				header('location:login.php');
			}											
		}
		else{
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$con_pass = $_POST['confirm'];
			$city = $_POST['city'];
			$address = $_POST['address'];

			$s = " select *from user_guardian where phone = '$phone'";

			$result = mysqli_query($con, $s);

			$num = mysqli_num_rows($result);

			if($password!=$con_pass){
				$msg1="<span style='color:red'>*Password not matched</span>";
			}
			elseif($num == 1){
				$msg2="<span style='color:red'>*Number Already Taken</span>";
			}
			else{
				$reg= " insert into user_guardian values('$name' , '$phone' , '$password' , '$con_pass' , '$city' , '$address')";
				mysqli_query($con, $reg);
				echo" Registration Successfull";
				header('location:login.php');
			}											
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<style>
		form table{
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
		  padding: 12px 20px;
		  font-size:14px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;

		}
		#submit{
			width:100%;
			padding:3px 15px;
			margin: 8px,0;
			border-radius: 10px;
			box-sizing: border-box;
			font-size:22px;
			background-color: #2e7bf7;
		}
		#submit:hover{
			background-color: #0440a0;
			color:white;
		}
		.reg{
			background-color: #e3edfc;
			width:80%;
			position: absolute;
			top:65px;
			bottom:0;
			left:0;
			right:0;
			margin:auto;
			border-collapse: separate;
			 border-spacing: 20px;	
		}

	</style>
</head>
<body  onload="init()">
	<div style="text-align: center;font-size:30px;color:#3178ed;">JUJ Tuition Media</div>
	<div style="float:right; padding-right:10%;">
	<i><a href="login.php">Back to sign in</a></i>
	</div>
	<table class="reg">
		<tr>
			<th  style="background-color: #aac4ef; height: 25px;font-size:22px;font-weight: 100;">Registration</th>	
		</tr>
		<tr>
			<td>
				<label for="Tutor">I am Tutor</label> <input type="radio" name="service" value="Tutor" id="Tutor"/>
				<label for="Guardian">I am Guardian</label> <input type="radio" name="service" value="Guardian" id="Guardian"/> 
			</td>
		</tr>
	</table>
	<?php if(isset($msg1)){ ?>
		<font style="text-align: left;margin-top: 200px;margin-left: 130px;"><?php echo $msg1; ?></font>
	<?php } ?>
	<?php if(isset($msg2)){ ?>
		<font style="text-align: left;margin-top: 200px;margin-left: 130px;"><?php echo $msg2; ?></font>
	<?php } ?>
	<form method="post" action="" id="form1">
		<input type="hidden" name="type" id="type" value="Tutor">
		<table style="margin-top: 100px;">
			<tr>
				<td>
					<label>Type your full name<font style="color:red;">*</font></label>
					<input type="text" name="name" id="name" placeholder="Your Name.." required>
				</td>
				<td><label>University<font style="color:red;">*</font></label>
					<input type="text" name="university" id="university" placeholder="Your University.." required></td>
			</tr>
			<tr>
				<td>
					<label>Type your phone number<font style="color:red;">*</font></label>
					<input type="text" name="phone" id="phone" placeholder="User Name.." required></td>
				<td><label>Educational Background<font style="color:red;">*</font></label>
					<select name="background" id="background">
						<option value="Bangla">Bangla Version</option>
						<option value="English">English Version</option>
						<option value="British">British Curriculum</option>
						<option value="American">American Curriculum</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Give a password<font style="color:red;">*</font></label>
				<input type="password" name="password" id="password" placeholder="Password" required>
				</td>
				<td><label>Department</label>
					<input type="text" name="department" id="department" placeholder="Department">
				</td>
			</tr>
			<tr>
				<td><label>Confirm password<font style="color:red;">*</font></label>
					<input type="password" name="confirm" id="confirm" placeholder="Confirm Password" required> 
				</td>
				<td><label>Living Place</label>
					<input type="text" name="place" id="place" placeholder="Living Place">					
				</td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="submit"id="submit" value="Sign up now"></td>
			</tr>
		</table>
	</form>
	
	<form method="post" action="" id="form2">
		<input type="hidden" name="type" id="type" value="Guardian"> 
    	<table style="margin-top: 100px; height: 400px;">
    		<tr>
    			<td><label>Type your full name<font style="color:red;">*</font></label>
    				<input type="text" name="name"id="name" placeholder="Your Name.." required></td>
    			<td><label>Type your phone number<font style="color:red;">*</font></label>
    				<input type="text" name="phone" id="phone" placeholder="User Name.." required></td>
    		</tr>
    		<tr>
    			<td><label>Password<font style="color:red;">*</font></label>
    				<input type="password" name="password"id="password" placeholder="Password" required></td>
    			<td><label>Confirm Password(Same as beside)<font style="color:red;">*</font></label>
    				<input type="password" name="confirm" id="confirm" placeholder="Confirm Password" required></td>
    		</tr>
    		<tr>
    			<td><label>Select City<font style="color:red;">*</font></label>
    			<select id="city"name="city">
    				<option value="Dhaka">Dhaka</option>
    				<option value="Chittagong">Chittagong</option>
    			</select></td>
    			<td><label>Address<font style="color:red;">*</font></label>
    			<input type="text" name="address"id="address"placeholder="Type Present Address" required></td>
    		</tr>
    		<tr>
    			<td colspan="2"><input type="submit" name="submit"id="submit" value="Sign up now"></td>
    		</tr>
    	</table>
	</form>	
	<script type="text/javascript">

		function init() {

		    document.getElementById("form1").style.display = "none";
		    document.getElementById("form2").style.display = "none";

		}
		(function(){
			let trans= document.getElementsByName("service");
			for(let i=0, len=trans.length; i<len; i++){
				trans[i].onchange=function(){
					if(this.value=="Tutor"){
						document.getElementById("form1").style.display="block";
						document.getElementById("form2").style.display="none";
					}
					else{
						document.getElementById("form1").style.display="none";
						document.getElementById("form2").style.display="block";
					}
				}
			}
		}());
	</script>
	

</body>
</html>