<?php
session_start();

if (!isset($_SESSION['loggedin'])){
	header ('Location: log.php');
	exit();
}

$recno= $_SESSION['recno'];
$fname= $_SESSION['fname'];
$lname= $_SESSION['lname'];
$image= $_SESSION['image'];


?>



<!DOCTYPE html>
<html>
<title>Tinaoganon Ako</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../css/search.css">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">

<style>
.imgs {
  border-radius: 50%;
}
.table, th, td {
	
	border: 0px solid black;
}
.mySlides {
	display:none;
	}
	
	.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
<body>

<div class="w3-container w3-green" style="position:fixed; top: 0; width:100%; height:110px; background-color:#52CA64;" >
  <table style="width:100%">
  <tr>
  <td>
  <div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  </td>
  <td style="width:70%;">
  <h4>Welcome <?php echo"$fname"; ?>!</h4>
  <p>Event / Products</p>
  </td>
  <td style="width:30%">
  <img class="imgs" src="../images/users/<?php echo $image; ?>" alt="Avatar" style="width:90%">
  </td>
  </tr>
  
  </table>
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="search.php">Search people</a>
  <a href="newsfeed.php">Public Message</a>
  <a href="event.php">Events</a>
  <a href="setting.php">Settings</a>
  <a href="about.php">About</a>
  <a href="logout.php">Sing-out</a>
</div>

</div>
<div style="height:90px">
<p></p>
</div>

 <div class="w3-content w3-section" style="width:100%; margin:2%">  
 <form method="post">
 <table style="width:100%;">
<tr>
<td>
<input style="width:65%" class="postmsg" type="text" placeholder="Search product here" name="msgtext"/>
<input style="width:30%" class="postbtn" type="submit" name="post" value="Find"/>
</td>
</tr>

<tr>
<td><p></p></td>
</tr>
<tr>
<td><p></p></td>
</tr>
</table>
 </form>
<?php
if (isset ($_POST['post']))
{
	include 'conn.php';
	$subject = $_POST['msgtext'];
	// $Encrypted=password_hash($pass, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO `newsfedd_tb` (posted_recno,subject)  
					    VALUES (1,'$subject') ");
						
	echo"<script type='text/javascript'>alert('Posting message successfully sent!')</script>";
	// header('Location: newsfeed.php');	
}

?>


 <?php
 
include 'conn.php';
$sel = "SELECT * FROM `product_tb` ORDER BY color,recno DESC";
$adap  = mysqli_query($conn, $sel);
while ($row = mysqli_fetch_assoc($adap))
{
	echo "<table style='width:97%; border-radius:5px; border:1px solid green;'>";
	echo "<tr>";
	echo "<td class='event_td'><h3>". $row['product_name'] ."</td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td class='event_td'>Size:". $row['size'] ." / Color:". $row['color'] ."</td>";	
	echo "</tr>";
	echo "<tr>";
	// echo "<td class='event_td'><img src='../images/Full.jpg' style='width:100%'></td>";	
	echo "<td class='event_td'><img src='../images/products/". $row['image'] ."' style='width:100%'></td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td class='event_td'>Price: &#8369; ". $row['price'] ."
	<a href='purches,php'>Get this?</td>";	
	echo "</tr>";
	echo "<table/>";
	echo "<br/>";
	
}
mysqli_close($conn);
?>

 
 

</div>



</body>



<!--=========================MenuBar-->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<!--=========================MenuBar-->


<!--=========================mySlides-->
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<!--=========================mySlides-->

</html>
