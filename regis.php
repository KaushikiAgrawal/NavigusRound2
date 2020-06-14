<?php
session_start();
$mysql1=new mysqli("localhost","root","","navgus");
if($mysql1->connect_error)
{
	die("Connection failed:".$mysql1->connect_error);
}
?>
<?php
$ier=$err="";
if(isset($_POST["s1"]))
{
	if($_POST["pd"]==$_POST["p1"])
	{
		$fname=$mysql1->real_escape_string($_POST['fname']);
		$lname=$mysql1->real_escape_string($_POST['lname']);
		$email=$mysql1->real_escape_string($_POST['email']);
		$pass=$mysql1->real_escape_string($_POST['pd']);
		$avatar=$mysql1->real_escape_string($_POST['ava']);
		$sql="INSERT INTO reg(fname,lname,email,password,avatar)
		VALUES ('$fname','$lname','$email','$pass','$avatar')";
		$sql3="SELECT email FROM reg WHERE email='$email'";

		if($mysql1->query($sql)===true)
		{
			$msg="Registration successful";
			echo "<script type='text/javascript'>
			alert('$msg');window.location='login.php';</script>";
			
		}
		else 		
			{
				$result2 = mysqli_query($mysql1,$sql3);
				$count2 = mysqli_num_rows($result2);
				if($count2==1)
				$err="Email ID already exists!";
		}
	}
	else	
		$perr="Password not matching!";
}
?>
<html>
<head>
<title>Presence Service</title>
<style>
fieldset{
background-color:transparent;
margin-bottom:auto;
margin-left:auto;
margin-right:auto;
color:white;
border-color:black;
}
.ab{
	background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
}

.ab:hover{
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.error{
	color:red;
	font-size:16px;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


</style>
<script>
function f1()
{
	var a =document.getElementById("pd").value;
	var b =document.getElementById("p1").value;
	if(a!=b)
	{
		window.alert("Password not matching!!");
	}
	if(a.length<6 &&a==b)
		window.alert("Weak password!! Length must be greater than 6");
}

</script>
</head>
<body background="bac.jpg">
<form method="POST">
<fieldset style="width:600;height:400px;">
<legend align="center" style="font-style:bold;"><B>Sign Up</B></legend>
<table border="0" align="center" style="font-size:20px;">
<tbody style="color:white;">
<tr>
<td><label for="name">FirstName </label></td>
<td><input id="name" maxlength="30" name="fname" type="text"placeholder="FirstName"required  autofocus/><span class="error">*</span></td>
</tr><br>

<tr>
<td><label for="lastname">LastName </label></td>
<td><input id="lastname" maxlength="30" name="lname" type="text" placeholder="LastName"/></td>
</tr>
<tr>
<td><label for="email">Email_Address </label></td>
<td><input id="email" maxlength="50" name="email" type="email" required placeholder="Email ID"/><span class="error">* <br><?php echo $err;?></span></td>
</tr>

<tr>
<td><label for="password">Enter Password </label></td>
<td><input id="pd" maxlength="30" name="pd"
type="password" placeholder="Password of atleast 6 chars" required /><span class="error">*</span></td>
</tr><br>
<tr>
<td><label for="password1">Re-confirm Password </label></td>
<td><input id="p1" maxlength="30" name="p1" type="password" placeholder="Reconfirm Password" required /><span class="error">*</span></td>
</tr><br>
<tr>
<td><label for="Avatar">Choose any Avatar </label></td>
<td>
<select name="ava" id="ava">
  <option>--Select any option--</option>
  <option value="ab1.jpg">1</option>
  <option value="ab2.png">2</option>
  <option value="ab3.png">3</option>
  <option value="ab4.png">4</option>
</select> <span class="error">*</span></td>
</tr>
<tr><td></td>
<td><input type="reset" class="ab" onclick="f2()" />
<input type="submit" class="ab" onclick="f1()" value="Sign Up" name="s1"></td>
</tr>
</tbody>
</table>
</form>
</fieldset>
</body>
<?php
$mysql1->close();
?>
</html>