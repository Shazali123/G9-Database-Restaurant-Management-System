<?php

session_start();

$table = $_SESSION['table'];

  
?>

<div class="container">
	
	<div class="card">
		<div class="card-image">	
			<h2 class="card-heading">
				Get started with your order
				<small></small>
			</h2>
		</div>
		<form class="card-form" action="3.php" method="post">
			<div class="input">
				<input type="number" id="table" name="table" class="input-field" value="<?php echo $table ?>" readonly/>
				<label class="input-label">Table</label>
			</div>
						<div class="input">
				<input type="tel" id="cusno" name="cusno" class="input-field" placeholder="0162429472" required/>
				<label class="input-label">Phone number</label>
			</div>
						<div class="input">
				<input type="text" id="email" name="email" class="input-field" placeholder="example@gmail.com" required/>
				<label class="input-label">Email</label>
			</div>
			<div class="action">
				<button class="action-button">Get started</button>
			</div>
		</form>
		<div class="card-info">
			<p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
		</div>
	</div>
</div>




<style>
<?php include 'test.css'; ?>
</style>