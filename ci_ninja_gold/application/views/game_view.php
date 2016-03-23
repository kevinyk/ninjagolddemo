<!DOCTYPE html>
<html>
<head>
<title>Ninja Gold Game</title>
<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
	<div id = 'gold'>Current gold: <?php echo $this->session->userdata('gold') ?></div>
	<div class = 'subcontent'>
		<h1>Farm</h1>
		<h2>(earns 10-20 golds)</h2>
		<form action = '/ninjaGold/process_money' method ='POST'>
			<input type = 'hidden' name = 'location' value = 'farm'>
			<input type = 'submit' value = 'Find Gold!'>
		</form>
	</div>
	<div class = 'subcontent'>
		<h1>Cave</h1>
		<h2>(earns 5-10 golds)</h2>
		<form action = '/ninjaGold/process_money' method ='POST'>
			<input type = 'hidden' name = 'location' value = 'cave'>
			<input type = 'submit' value = 'Find Gold!'>
		</form>
	</div>
	<div class = 'subcontent'>
		<h1>House</h1>
		<h2>(earns 2-5 golds)</h2>
		<form action = '/ninjaGold/process_money' method ='POST'>
			<input type = 'hidden' name = 'location' value = 'house'>
			<input type = 'submit' value = 'Find Gold!'>
		</form>
	</div>
	<div class = 'subcontent'>
		<h1>Casino</h1>
		<h2>(earns/takes 0-50 golds)</h2>
		<form action = '/ninjaGold/process_money' method ='POST'>
			<input type = 'hidden' name = 'location' value = 'casino'>
			<input type = 'submit' value = 'Find Gold!'>
		</form>
	</div>
	<div id = 'activity_feed'>
<?php
	foreach($this->session->userdata('activity_log') as $activity){
		echo $activity;
	} 
?>
	</div>
