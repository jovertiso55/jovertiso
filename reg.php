<!DOCTYPE html>
<html>
<title>Tinaoganon Ako</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../css/registration.css">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">

<style>

.table, th, td {
	
	border: 0px solid black;
}

</style>
<body>


<div style="background-color:#52CA64">
  <table style="width:100%">
  <tr>
  <td>
  <td style="text-align:center;">
  <h3> Welcome to Tinaoganon Ako!</h3>
  <p>Official website (trial)</p>
  </td>
  <td>  </td>
  </tr>
  </table>
</div>

<form method="post" autocomplete="off">
<div>
  <table class="table_reg" style="width:100%; text-align:center;" >
  <tr> <th colspan=2>Register here</th></tr>
  <tr> <th colspan=2><p></p></th></tr>
  <tr>
  <td><input class="reg_textbox" type="text" placeholder="Firstname" name="fnametextbox" required></td>
   <td><input class="reg_textbox" type="text" placeholder="Lastname" name="lnametextbox" required></td>
  </tr>
  <tr>
  <th colspan=2><input class="reg_textbox" type="text" placeholder="Cellphone number" name="celltextbox" required></th>
   </tr>
   <tr>
  <th colspan=2><input class="reg_textbox" type="Password" placeholder="Password" name="passtextbox" required></th>
   </tr>
    <tr>
  <th colspan=2><P></P></th>
   </tr>
   <tr>
  <th colspan=2><input class="btn_reg" type="submit" name="submit" value="Register now!"></th>
  </tr>
  </table>
</div>

<?php
if (isset ($_POST['submit']))
{
	
	include 'conn.php';
	$fname = $_POST['fnametextbox'];
	$lname = $_POST['lnametextbox'];
	$cellno = $_POST['celltextbox'];
	$pass = $_POST['passtextbox'];
	// $Encrypted=password_hash($pass, PASSWORD_DEFAULT);
	$Encrypted=password_hash($pass, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO `user_tb` (fname,lname,contact_no,password)  
					    VALUES ('$fname','$lname','$cellno','$Encrypted') ");
						
	echo"<script type='text/javascript'>alert('You are now registered')</script>";
	header('Location: log.php');
	
}

?>
</form>


</body>
<script>
function Goto(){
	
	// location.replace("http://localhost:8012/Tinaogan/page/newsfeed.php");

}
</script>
</html>
