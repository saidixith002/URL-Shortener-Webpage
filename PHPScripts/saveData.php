<?php
	
	include "config.php";
	$shorten_url = mysqli_real_escape_string($conn, $_POST['shorten_url']);
	$ful_url = mysqli_real_escape_string($conn, $_GET['full_url']);
	
	$shorten_url = substr($shorten_url,16);
	
	$sql = mysqli_query($conn , "SELECT shorten_url from url where shorten_url = '{$shorten_url}' ");
	if(mysqli_num_rows($sql) > 0){
		
		echo "This short url is already been taken" ;
	}
	else{
		$sql2 = mysqli_query($conn, "Insert into url (shorten_url,full_url,clicks) 
										values('{$shorten_url}','{$ful_url}','0')");
		if($sql2){
			$sql3 = mysqli_query($conn , "SELECT shorten_url from url where shorten_url = '{$shorten_url}'");
			if(mysqli_num_rows($sql3)>0){
				$shorten_url = mysqli_fetch_assoc($sql3);
				echo $shorten_url['shorten_url'];
			}
	
		}else{echo "insertion failed";}
	}
	
?>
