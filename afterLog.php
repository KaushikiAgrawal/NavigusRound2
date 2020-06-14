<?php
session_start();
$mysql1=new mysqli("localhost","root","","navgus");
if($mysql1->connect_error)
	die("connection failed:".$mysql1->connect_error);
$p=$_SESSION['emal'];
?>
<?php
function f1() {
  $sql="DELETE FROM login WHERE email='$s'";
  $mysql1->query($sql);
} 
?>
<html>
<head>
<title>Home</title>
<style>
body{
background-image:url("bg.jpg");
height:"100px";
width:"100px";
}
</style>
<script>

</script>
</head>
<body>
<center>
<fieldset style="height:50%;width:50%;">
<legend style="margin-left:250px;margin-right:250px;">WELCOME USER</legend>
<form method="POST">
<br><br>
<button name="submit1" style="font-size:20px;border-radius:8px;width:220px;background-color:transparent;text-align:center;cursor:pointer;" onclick='window.open("dashboard.php")'><b>See Active Users</b><br></button>
<br><br><br><br>
<button name="logout" style="font-size:20px;border-radius:8px;width:220px;background-color:transparent;text-align:center;cursor:pointer;" onclick="f1()"><b>Logout</b><br></button>
</form>
</body>
</html>