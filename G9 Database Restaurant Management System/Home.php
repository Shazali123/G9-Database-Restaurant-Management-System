<?php
 
session_start();



?>




<p style="margin-top: 300px;"></p>


<h1 style="text-align: center;">Restaurant Fauzan</h1>

<form action="1.php" method="post">

<div class="text-center">
<input type="submit" value="Customer">
</div>
</form>

<form action="staff.php" method="post">

<div class="text-center">
<input type="submit" value="Staff">
</div>
</form>



<style>

body {
	font-family: "DM Sans", sans-serif;
	line-height: 1.5;
	background-color: #f1f3fb;
	padding: 0 2rem;
}

.text-center {
  text-align: center;
}

input[type=submit] {
  background-color: white;
  color: black;
  border: 2px solid #555555;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 200px;
}

input[type=submit]:hover {
  background-color: #6658d3;
  color: white;
}



</style>