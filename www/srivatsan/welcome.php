<?php
if(!isset($_SESSION)) session_start();
?>

<head>
<style>
#welcome {
	background: orange;
	height: 60px;
	width:350px;
}
</style>
</head>
<body>
<div id=welcome>
<?php 
if($_SESSION['showLogout']=="true") 
echo "<h2>Wanna try once more?</h2>";
else
echo "<h2>Login Success.</h2>";
?>
<br><br><br>
<h3>Upload your pic before 20 seconds.<br>
File type: JPEG only. 
File Size: 50kb max.<br>
</h3>
<form method='post' action='upload.php' enctype='multipart/form-data'>
<input type='file' name='fileUpload'><br>
<input type='submit'>
</form>
<br><br>
</div>
</body>