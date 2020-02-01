<?php
session_start();

include 'conn.php';

$conn = mysqli_connect ($servername, $username, $password, $dbname);


if (mysqli_connect_errno() ){	
	die ('Failed to connect to MYSQL: '. mysqli_connect_error());
}


if (!isset($_POST['celltextbox'], $_POST['passtextbox']) ){
	die ('Please fill both the cell number and password field!');
}

if ($stmt = $conn->prepare('SELECT recno,contact_no,password,fname,lname,image FROM user_tb WHERE contact_no = ?')){
	
	$stmt->bind_param('s', $_POST['celltextbox']);
	$stmt->execute();
	$stmt->store_result();
	
}

$stmt->store_result();

if ($stmt->num_rows > 0 ){
	$stmt->bind_result($recno,$contact_no, $password,$fname,$lname,$image);
	$stmt->fetch();
	
	if (password_verify($_POST['passtextbox'], $password)){
		
	session_regenerate_id();
	$_SESSION['loggedin']=TRUE;
	$_SESSION['contact_no']= $_POST['contact_no'];
	$_SESSION['recno']=$recno;
	$_SESSION['fname']=$fname;
	$_SESSION['lname']=$lname;
	$_SESSION['image']=$image;
	header ('Location: newsfeed.php');	
    } else  {  
	  echo 'Incorrect password!';
	  echo "<br/>";
	  echo "<a href='log.php'>Login again</a>";
	  // header ('Location: log.php');
	}
} else {
	
	  header ('Location: log.php');	
	  echo 'Incorrect username!';
	  echo "<br/>";
	  // echo "<a href='log.php'>Login again</a>";
}
$stmt->close();