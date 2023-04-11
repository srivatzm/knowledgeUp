<?php
if(!isset($_SESSION)) session_start();
$loginsuccess = "false";
if(!isset($_SESSION['loginsuccess'])) {
    $_SESSION['loginsuccess'] = $loginsuccess;
}else {	
	$loginsuccess = $_SESSION['loginsuccess'];
}

if($_SESSION['showLogout']=="true")
echo "<h4 style='color: red'>Keep Refreshing to Logout after 20 seconds expires.</h4>";

$date = new DateTime();
echo "<h2>Welcome to Image Upload Contest !!</h2><br>";
echo "<h4>Rule:<br>1. Enter your name and your email in the below SignUp form.<br>2. You will move to Contest page.<br>"
	."3. Within 20 seconds, Quickly upload only a jpeg image of size less than 500kb only.<br>4. Result will be shown. <br>"
	."5. Use your name and email and click Winner board to see your success entry.</h4><br><br>";
echo "Date and Time is ".$date->format('Y-m-d H:i:sP');
if($loginsuccess=="false" && !isset($_COOKIE['STAY'])) {
	include "login.php";
	$_SESSION['showLogout']="false";
} else {
	include "welcome.php";
	$_SESSION['loginsuccess']="false";
}

echo "<br>IP:".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT'];
?>
<title>Image Upload Contest</title>