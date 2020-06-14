<?php
session_start();
$fn=$_COOKIE['username'];
$av=$_COOKIE['avatar'];
$em=$_COOKIE['emal'];
$mysql1=new mysqli("localhost","root","","navgus");
if($mysql1->connect_error)
	die("connection failed:".$mysql1->connect_error);

?>
<html>
<head>
<script>
</script>
<style>
div{
	background-color:transparent;
	font-size:25px;
	color:white;
	
    }
   p{
	font-family:Forte;
	font-size:40px;
	color:green;
   }
h3{
	text-align:center;
}

.topnav
	{
		background-color:transparent;
	}
.topnav a:hover{
	background-color:#ddd;
	color:white;
	}
.topnav a{
		float:right;
		color:black;	
		
		padding:14px 16px;
		text-decoration:none;
		font-size:22px;
	}
	

/* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
 
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  font-size:15px;
  border-radius: 5px;
 top: 100%;
  left: 50%; 
  margin-left: -60px;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}


/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}

img {
  border-radius: 50%;
}
  </style>
  </head>
<body>
<p> Active users</p>
<?php
$sql = "SELECT * FROM login";
$result = mysqli_query($mysql1,$sql);
while($row = mysqli_fetch_array($result)) {
	echo"<div class='tooltip'>
	<img src='$row[2]' height=100px width=100px >";
  echo"<span class='tooltiptext'>$row[0]</span>" ;
  echo "</div> ";
 } 

echo "</form>";
?>
</body>
</html>						