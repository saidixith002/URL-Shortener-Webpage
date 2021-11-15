<?php
	require_once('config.php');
	 
	$ful_url = mysqli_real_escape_string($conn, $_POST['full_url']);
	if(!empty($ful_url) && filter_var($ful_url , FILTER_VALIDATE_URL)){
		
		
		$sql = mysqli_query($conn , "SELECT shorten_url from url where full_url = '{$ful_url}' ");
		if(mysqli_num_rows($sql) > 0){
			echo "This url already been used. Please see the table!!" ;
		}else{
			$ran_url = substr(md5(microtime()), rand(0,26),5);
			$sql = mysqli_query($conn , "SELECT shorten_url from url where shorten_url = '{$ran_url}' ");
			while(mysqli_num_rows($sql) > 0){
				$ran_url = substr(md5(microtime()), rand(0,26),5);
				$sql = mysqli_query($conn , "SELECT shorten_url from url where shorten_url = '{$ran_url}' ");
			}
			echo $ran_url;
		}
	}else{
		echo "$ful_url - This is not valid url";
	}
?>