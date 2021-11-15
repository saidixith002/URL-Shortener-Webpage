<?php

	include "config.php";
	$shorten_url = mysqli_real_escape_string($conn, $_GET['u']);
	
	$sql = mysqli_query($conn, "delete from url where shorten_url = '{$shorten_url}'");
	header("Location:/url");
?>