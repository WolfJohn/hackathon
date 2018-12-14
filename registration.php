<?php
 session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="script/login.js"></script>
		<title>Cybercode E-learning - Registration</title>
	</head>
  <body>
  <div class="container">
			<div class="form">
			<div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
				<form action='verification.php' method='post'>
					<label for='login'>Логин</label><br>
					<input id='login' type='text' name='login' required><br>
					
					<label for='password'>Пароль</label><br>
					<input id='password' type='password' name='password' onkeyup="validatetextbox(this)" required>
					<span id='pass_toggle' onclick="showpass(this, 'password')" class="fa fa-fw fa-eye fa-eye-slash field-icon"></span>
					
					<label for='password2'>Подтверждения пароля</label><br>
					<input id='password2' type='password' name='password2' onkeyup="validatetextbox(this)" required>
					<span id='pass_toggle' onclick="showpass(this, 'password2')" class="fa fa-fw fa-eye fa-eye-slash field-icon"></span>
					
					<label for='email'>E-mail</label><br>
					<input id='email' onkeyup='validate(this)' type='text' name='email' required><br>
					<br>
					<button id="subbut" class='sub' type='submit' name='submit'>Регистрация</button>
				</form>
				<br><a href='index.php'>На главную</a>
			</div>
		</div>
 </body>
 </html>