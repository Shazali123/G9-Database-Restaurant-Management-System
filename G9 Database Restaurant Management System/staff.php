<?php

session_start();

include 'db.php';

  
?>

<h1 style="text-align: center;">Restaurant Fauzan</h1>
<h2 style="text-align: center;">Staff Portal</h2>

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="login_validation.php" method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" id="email" name="email" class="login__input" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" id="psw" name="psw" class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<style>
<?php include 'test3.css'; ?>
</style>