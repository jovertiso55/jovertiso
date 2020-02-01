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
<link rel="stylesheet" type="text/css" href="../css/newsfeed.css">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">

<style>
.imgs {
  border-radius: 50%;
  border:1px solid black;
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
  <h4>Welcome <?php echo"$fname"; ?> :-)</h4>
  <p>Public Message</p>
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
<input class="postmsg" type="text" placeholder="Send public message here" name="msgtext"/>
<input class="postbtn" type="submit" name="post" value="Ok"/>
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
					    VALUES ('$recno','$subject') ");
						
	echo"<script type='text/javascript'>alert('Posting message successfully sent!')</script>";
	// header('Location: newsfeed.php');
	
}

?>


 <?php
include 'conn.php';
$sel = "SELECT * 
		FROM `newsfedd_tb` t1

		LEFT JOIN (SELECT recno as num,
						concat(fname,' ',lname) as fullname,image
				   FROM user_tb)t2
				   on t1.posted_recno = t2.num

		WHERE 1
		ORDER BY t1.RecNo DESC";
$adap  = mysqli_query($conn, $sel);
echo "<table style='width:97%'>";
while ($row = mysqli_fetch_assoc($adap))
{
	echo "<tr>";
	echo "<td class='psted_newsfeed'>
	<img class='imgs' src='../images/users/". $row['image'] ."' alt='Avatar' style='width:10%'> ". $row['fullname'] ."</td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td class='td_newsfeed'>". $row['subject'] ."</td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td class='status_newsfeed'>
	      <img src='../images/like.png' alt='Avatar' style='width:5%'>
		  <img src='../images/comment.png' alt='Avatar' style='width:5%'>
		  
		  ". $row['posted_date'] ."</td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td><p></p></td>";	
	echo "</tr>";
	echo "<tr>";
	echo "<td><p></p></td>";	
	echo "</tr>";
	
}
echo "<table/>";
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
