<?php
if(!isset($_SESSION)) session_start();
setcookie("STAY", "true", time()+20);
if(isset($_POST['submit'])) {	
	$_SESSION['loginsuccess'] = "true";
	$_SESSION['name'] = $_POST['uname'];
	$_SESSION['email'] = $_POST['email'];
	if($_POST['uname'] != '' && $_POST['email'] != '') {
	echo "<h1>Welcome ".$_POST['uname']."</h1>";
	echo "<br><br><h2>Entering to Image Upload Contest in 3 seconds...<h2>";
	echo '<script>setTimeout(function(){window.location.href = "hello.php"}, 3 * 1000);</script>';
	}else {
		echo "Invalid credentials<br><br>";
		clear();		
	}
}
if(isset($_POST['winner'])) {
	$user = $_POST['uname'];
	$email = $_POST['email'];
	if($user != '' && $email != '') {
	$query = "SELECT * from contest where name='" . $user . "' and email = '" . $email . "'";
	//echo "Query=" . $query;
	$con = mysqli_connect('localhost', 'sriv', 'Password123', 'image_contest');
	if(!$con) {
		die("Error=" . mysqli_connect_error . "<br>ErrorNo=" . mysqli_connect_errno);
	}	
	$rows = mysqli_query($con, $query) or die(mysqli_error($con));
	$rowcount=mysqli_num_rows($rows);
	if($rowcount>0) {
		echo "<h1>Winner Board.</h1><br><br><h2>Congratulations !!</h2>";
		echo "<table width='100%' border=1><tr><th>Name</th><th>Email</th><th>Image</th></tr>";
		while ($var = mysqli_fetch_array($rows)) {
			echo "<tr><td>" . $var['name'] . "</td><td width=50%>" . $var['email'] . "</td><td width=25%><img height=200 width=500 src='images/" . $var['file'] . "'></td></tr>";
		}
		echo "</table><br><br>";
		mysqli_close($con);
	}
	else {
		echo "Invalid credentials<br><br>";
		clear();
	}
	}
	else {
		echo "Invalid credentials<br><br>";
		clear();
	}
}
echo "<br><br><br><br><br><br><a href=hello.php>Logout</a>";
	

function clear() {
	$_SESSION['loginsuccess']="false";
	$_SESSION['showLogout']="false";
	setcookie("STAY", "", time()-3600);
}

?>


