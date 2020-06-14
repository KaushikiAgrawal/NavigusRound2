<?php 
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$mysql1=new mysqli("localhost","root","","navgus");
		if($mysql1->connect_error)
			die("connection failed:".$mysql1->connect_error);
}
?>
<?php
	if(isset($_POST["b1"]))
	{
      $myusername = mysqli_real_escape_string($mysql1,$_POST['email']);
      $mypassword = mysqli_real_escape_string($mysql1,$_POST['password']); 
      $sql = "SELECT * FROM reg WHERE email = '$myusername' and password = '$mypassword'";
	  $sql2 = "SELECT * FROM login WHERE email = '$myusername' and password = '$mypassword'";
	  $result2 = mysqli_query($mysql1,$sql2);
      $row2 = mysqli_fetch_array($result2);
      $count2 = mysqli_num_rows($result2);
	   if($count2 == 1)
	   {
		   
		   header("location: afterLog.php");
	   }
	  else {
	  $result = mysqli_query($mysql1,$sql);
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
	  $a=$row[4];
      if($count == 1) 
	  {
		$sql1="INSERT INTO login VALUES('$myusername','$mypassword','$a')";
		if($mysql1->query($sql1)===true)
		{
			session_register("$myusername");
			$_SESSION['emal'] = $row["email"];
			$_SESSION['username']=$row['fname'];
			$_SESSION['avatar']=$row['avatar'];			
			setcookie("emal",$row['email']);	
			setcookie("username",$row['fname']);
			setcookie("avatar",$row['avatar']);
			header("location: dashboard.php");
		}
	  }
	  else
		{
		 header('location: error.php');
		 
      }
	  }
   }
?>
<html>
<head>
<style>
.font1{
font-size:20px;
color:white;
}
body{
background-image:url("LogBa.jpg");
height:"100px";
width:"100px";
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 10px 15px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}


.round {
  border-radius: 90px;
}
</style>
</head>
<body>
<center>
<fieldset style="height:50%;width:50%;">
<legend><font color="white">LOGIN</font></legend>
<form method="POST">
<table>
<tr class="font1">
<br><br><br>
<td>
<b>UserName:</b></td><td><input type="text" name="email" placeholder="UserName" size="30px" autofocus style="height:30px;"><br></td>
</tr>
<tr class="font1">
<td>
<b>Password:</b></td><td><input type="password" name="password" placeholder="Password" size="30px"style="height:30px;"><br></td>
</tr>
<tr>
<td></td>
<td><input value="Login" type="submit" name="b1" style="background-color:green;font-size:19px;border-radius:6px;color:white; width:90px; text-align:center;cursor:pointer";><br></td>
</tr>
<tr class="font1">
<td></td>
<td><font color="white"><b>Don't have an Account?</b></font><br></td>
</tr>
<tr class="font1">
<td></td>
<td>
<button name="submit1" style="font-size:20px;border-radius:8px;color:white;width:220px;text-align:center;background-color:transparent;cursor:pointer;" onclick='window.open("regis.php")'><b>Create Account Now</b><br></button>
</td>
</tr>
</table>
</form>
</center>
</fieldset>
</body>
</html>