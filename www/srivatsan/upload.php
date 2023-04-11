<?php
$user = "none";
$email = "none";
$file = "none";
if(!isset($_SESSION)) session_start();
$_SESSION['showLogout']="true";
$user = $_SESSION['name'];
$email = $_SESSION['email'];
$file = $_FILES['fileUpload']['name'];

function record($user, $email, $file) {
	$query = "INSERT INTO contest(name, email, file) VALUES ('" . $user . "', '" . $email . "', '" . $file . "')";
	//echo "<br>Query: " . $query . "<br>";
	$con = mysqli_connect('localhost', 'sriv', 'Password123', 'image_contest');
	if(!$con) {
		die("Error=" . mysqli_connect_error . "<br>ErrorNo=" . mysqli_connect_errno);
	}
	//echo "Connected to DB for recording..<BR>";
	
	mysqli_query($con, $query) or die(mysqli_error($con));
	//echo "<br>Recording Success<br>";
	
	
	mysqli_close($con);
}

$type = $_FILES['fileUpload']['type'];
$size = $_FILES['fileUpload']['size'];

if($type!="image/jpeg" || $size>=500000) {
	echo "<h2 class=red>Wrong Type or File size more than 500kb. Sorry.</h2>";
}else {
echo "<H1 class=green>Your Upload was correct !!</h1><BR><br>";
echo "<h3 class=green>Recording your entry. <br><br>Check Winner-board in login page.</h3>";
move_uploaded_file($_FILES['fileUpload']['tmp_name'],"C:\\wamp64\\www\\srivatsan\\images\\" . $_FILES['fileUpload']['name']);
//echo "<br> Moved " . $_FILES['fileUpload']['tmp_name'] . " to " . "C:\\wamp64\\www\\srivatsan\\images\\" . $_FILES['fileUpload']['name'];
record($user, $email, $file);
}
echo "<h4 class=green>Redirecting..</h4>";
echo '<script>setTimeout(function(){window.location.href = "hello.php"}, 5 * 1000);</script>';

?>

<head>
<style>
	.green {
      color: green;
    }
	
	.red {
      color: red;
    }
</style>
</head>