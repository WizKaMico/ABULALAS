<?php
	$conn = mysqli_connect('localhost', 'root', '', 'school_portal');
 
	if(!$conn){
		die('Error: Failed to connect to database');
	}
?>