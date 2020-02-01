<!DOCTYPE html>
<html>
<title>Tinaoganon Ako</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">

<style>
.imgs {
  border-radius: 50%;
}
.table, th, td {
	
	border: 1px solid black;
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

<div class="w3-container w3-green" style="position:fixed; top: 0; width:100%; height:auto;" >
  <table style="width:100%">
  <tr>
  <td>
  <div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  </td>
  <td style="width:70%">
  <h3>Tinaoganon Ako!</h3>
  <p>News Feed</p>
  </td>
  <td style="width:30%">
  <img class="imgs" src="../images/img_avatar.png" alt="Avatar" style="width:90%">
  </td>
  </tr>
  
  </table>
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Search people</a>
  <a href="#">News feed</a>
  <a href="#">Events</a>
  <a href="#">About</a>
</div>

</div>
<div style="height:90px">
<p></p>
</div>

 <div class="w3-content w3-section" style="width:100%; margin:2%">
 
 <p id="demo"></p>
   
  <div id="findingDiv"></div> 
<!--=========================LoopNewsFedd-->
<script>
var text="";
var i = 0;
while ( i < 10) {	
	text += "<br>the number is " + i;
	i++;
}
document.getElementById("demo").innerHTML = text;
</script>
<!--=========================LoopNewsFedd-->

	
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
