<?php 
  if(isset($_COOKIE['cookie_name'])){
    header('location:user.php');
  }
  else{
	session_start();
	if(isset($_POST['Submit'])){
		$con = mysqli_connect('localhost','root','');

		mysqli_select_db($con,'userregistration');

		$name = $_POST['user'];
		$pass = $_POST['password'];
    $type = $_POST['type'];
    if($type=="Tutor"){
      $s = " select * from user_tutor where phone = '$name' && password = '$pass'";
      $f=" select name from user_tutor where phone = '$name' && password = '$pass'";
    }
    else{
      $s= " select * from user_guardian where phone = '$name' && password = '$pass'"; 
      $f=" select name from user_guardian where phone = '$name' && password = '$pass'";
    }
    
		$result = mysqli_query($con, $s);
		$num = mysqli_num_rows($result);
    

		if($num == 1){
      $_SESSION['type']=$type;
      if($type=="Tutor")
        $_SESSION['request']="Tuition";
      else $_SESSION['request'] ="Tutor";
      
			$_SESSION['userdata']['user']=$pass;
			$_SESSION['user']=$name;
      $fname = mysqli_query($con,$f);
      $row=$fname->fetch_assoc();
      foreach($row as $value) $_SESSION['name']=$value;
			$_SESSION['remember']=$_POST['remember'];
			header('location:user.php');
		}
		else{
			$msg="<span style='color:red'>Incorrect Username or Password</span>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link type="text/css" href="style.css" rel="stylesheet">
</head>
<body style="background-color: #fff;">
    <div id="Frame0">
  <h1 align="center" color="">JUJ Tuition Media</h1>
</div>
<br>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Sign In</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="user" type="text" class="Input" placeholder="Your Phone No.."></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="password" type="password" class="Input" placeholder="Password.."></td>
    </tr>
    <tr>
      <td style="float:right;">
        <input type="radio" name="type" value="Tutor">Tutor
      </td>
      <td><input type="radio" name="type" style="display:inline;" value="Guardian">Guardian</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="font-style:italic;"><input type="checkbox" name="remember"> Remember Me</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
     <td><input name="Submit" type="submit" value="Login" class="Button3">
        <a href="register.php" style="padding-left:20px;"><i>Not Register Yet?</i></a>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
	}
?>