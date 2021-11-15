<?php

	include "config.php";
	$sql = mysqli_query($conn, "delete from url ");
	header("Location:/url");
?>