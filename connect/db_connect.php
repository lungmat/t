<?php
$mysqli = mysqli_connect('10.96.37.250','root','root','qr');
$mysqli->set_charset('utf8');
if(mysqli_connect_errno()){
	echo 'Connect Failed: '.mysqli_connect_error();
	exit;
}
?>