<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold - Login or Register</title>
</head>
<body>
	<h1>Log in or register to play NinjaGold</h1>
	<h2>Registration form:</h2>
	<?php echo $this->session->userdata("errorsR") ?>
	<form id = 'register' method = 'POST' action = '/LoginReg/process_registration'>
		<input type = 'hidden' name = 'action' value ='register'>
		Enter your name: <input type = 'text' name = 'name'>
		Enter your email: <input type = 'text' name = 'email'>
		Enter your password: <input type = 'password' name = 'pw'>
		Confirm your password: <input type = 'password' name = 'pw_confirm'>
		<input type = 'submit'>
	</form>
	<h2>Registered users login here:</h2>
	<form id = 'register' method = 'POST' action = '/LoginReg/process_login'>
		<input type = 'hidden' name = 'action' value = 'login'>
		Enter your email: <input type = 'text' name = 'email'>
		Enter your password: <input type = 'text' name = 'pw'>
		<input type = 'submit'>
	</form>
</body>
</html>