<?php
	
	$conn = mysqli_connect("localhost", "root" , "" ,"urlshortenerdatabase");
	if(!$conn){
		echo "Database Connetction error".mysqli_connect_error();
	}
	
?>