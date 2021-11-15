<?php 
	if(isset($_GET['u'])){
		
		include "PHPScripts/config.php";
		echo $_GET['u'];
		$u = mysqli_real_escape_string($conn , $_GET['u']);
		
		$sql = mysqli_query($conn , "select full_url,clicks from url where shorten_url = '{$u}'");
		if(mysqli_num_rows($sql) > 0){
			$full_url = mysqli_fetch_assoc($sql);
			$click =  $full_url['clicks'] + 1;
			$sql1 = mysqli_query($conn, "update url set clicks={$click} where shorten_url='{$u}'");
			header("Location:".$full_url['full_url']);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>URL Shortener </title>
  <link rel="stylesheet" href="style.css">
  <!-- Iconsout Link for Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
<body>
	<div class="main-class">
			<h1 style="text-align:center; width:100%;margin-bottom:10px;">Paste the URL to be Shorten</h1>
		<form >
			
			<i class="url-icon uil uil-link"></i>
			<input type=text name="full_url"  placeholder="Enter the link" required/>
			<button onClick="shortenBtnCLicked()">Shortern URL</button>
		</form>
		<?php 
			include "PHPScripts/config.php";
			$sql2 = mysqli_query($conn , "select * from url order by id DESC");
			if(mysqli_num_rows($sql2) > 0){
		?>
			<div class="click-count-class">
				<?php
					$sql = mysqli_query($conn , "select * from url");
					$clicks = 0;
					$links = 0;
					while($row = mysqli_fetch_array($sql)){
						$links = $links + 1;
						$clicks = $clicks + $row['clicks'];
					}
				?>
			<span>Total Links: <span> <?php echo $links ?></span> & Total Clicks: <span> <?php echo $clicks ?> </span></span>
				<a href=" <?php echo 'PHPScripts/deleteAllRows.php' ?>"> Clear All </a>
			</div>
			
			<div class="url-table">
				<div class="url-table-titles">
					<li> Shorten Url </li>
					<li> Original Url </li>
					<li> Clicks </li>
					<li> Action </li>
				</div>
			<?php 
				while($row = mysqli_fetch_assoc($sql2)){
					
				
			?>
				<div class="url-table-data">
					<li> <a href=" <?php echo '?u='.$row['shorten_url'] ?>" target="_blank"> <?php echo "localhost/url/".$row['shorten_url'] ?> </a></li>
					<li style="justify-content:left;"> <?php
						if(strlen($row['full_url']) > 60){
						  echo substr($row['full_url'], 0, 60) . '...';
						}else{
						  echo $row['full_url'];
						}
						?> 
					</li>
					<li> <?php echo $row['clicks'] ?> </li>
					<li> <a href=" <?php echo 'PHPScripts/deleteRow.php?u='.$row['shorten_url'] ?>">Delete</a> </li>
				</div>			
			
		
		<?php
				
				}
			}
		?>
		</div>
		
	</div>
	<div class="popup-background-blur"></div>
	<div class="popup-box">
		<div class="info-box ">
			Your short link is ready.
		</div>
		<form >
			<label>Edit your shorten Url</label>
			<input type=text name="shorten_url" spellcheck="false" value="" />
			<button>save</button>
		</form>
	</div>
	<script src="script1.js"></script>
</body>
</html>
