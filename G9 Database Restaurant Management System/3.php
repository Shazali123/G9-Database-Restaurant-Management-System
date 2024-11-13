<?php

include 'db.php';

session_start();

$_SESSION['table'] = $_POST['table']; 
  
$_SESSION['cusno'] = $_POST['cusno']; 
  
$_SESSION['email'] = $_POST['email']; 

$table = $_SESSION['table'];

$number = $_SESSION['cusno'];

$email = $_SESSION['email'];


	$sql = "SELECT customer_email FROM customer WHERE customer_email = '$email'";
       $result = $conn->query($sql);

       if($result->num_rows > 0) {
           
       } 
		else {
			
			$Customer = mysqli_query($conn, "INSERT INTO customer(customer_no,customer_email) VALUES('$number','$email')");
		}
		

	
	$query = "SELECT * FROM menu";			
?>


   
   

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

<div class="text-center">
<table class="styled-table">
<form action="4.php" method="POST">
  <tr>
    <th>Menu</th>
    <th>Menu Description</th>
    <th>Price</th> 
    <th>Qty</th>
  </tr>
  <?php
$query = "SELECT * FROM menu";





if ($result = $conn->query($query)) {

	$i = 0;

    while ($row = $result->fetch_assoc()) {
        $item_id = $row["item_id"];
        $item_name = $row["item_name"];
		$item_desc = $row["item_desc"];
		$price = $row["price"];
       
	  ?>

    <tr>
    <td>
	<input type="hidden" name="item_id[<?php echo $i; ?>]" value="<?php echo $item_id; ?>" />
    <?php echo $item_name    ?> &nbsp&nbsp
	<input type="hidden" name="item_name[<?php echo $i; ?>]" value="<?php echo $item_name; ?>" />
    </td>
    <td>&nbsp&nbsp <?php echo $item_desc    ?> &nbsp&nbsp </td> 
	<input type="hidden" name="item_desc[<?php echo $i; ?>]" value="<?php echo $item_desc; ?>" />
    <td>&nbsp&nbsp RM<?php echo $price    ?> &nbsp&nbsp </td>
	<input type="hidden" name="price[<?php echo $i; ?>]" value="<?php echo $price; ?>" />
    <td> 
    <div class="number-input">
  	<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" id="1"></button>
  	<input class="quantity" min="0" id="qty1" name="qty[<?php echo $i; ?>]" value=0 type="number">
  	<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" id="1"></button>
	</div>
    </td>	
    </tr>

 <?php 
 
 	  $i++;  
    }
	}
	
	
?>
  	
</table>
</div>
<input type="hidden" name="count" value="<?php echo $i; ?>" />

<input type="hidden" id="table" name="table" value= "<?php echo $table ?>">

<input type="hidden" id="cusno" name="cusno" value= "<?php echo $number ?>">

<input type="hidden" id="email" name="email" value= "<?php echo $email ?>">

<br>
<div class="text-center">
<input type="submit" name="save" id="save">
</div>
</form>
 

<style>
body {
	font-family: "DM Sans", sans-serif;
	line-height: 1.5;
	background-color: #f1f3fb;
	padding: 0 2rem;
}


input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
  
}


input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 3rem;
  height: 3rem;
  cursor: pointer;
  margin: 0;
  position: relative;
}

.number-input button:after {
  display: inline-block;
  position: absolute;
  font-family: "Font Awesome 5 Free"; 
  font-weight: 900;
  content: '\f077';
  transform: translate(-50%, -50%) rotate(180deg);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(0deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 5rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 2rem;
  height: 3rem;
  font-weight: bold;
  text-align: center;
}

.styled-table {
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
	margin-left: auto;
  	margin-right: auto;
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

input[type="submit"] {
  background-color: white;
  color: black;
  border: 2px solid #555555;
  padding: 16px 32px;
  display: inline-block;
  font-size: 16px;
  margin: auto;
  transition-duration: 0.4s;
  cursor: pointer;
  width: 200px;
}

input[type="submit"]:hover {
  background-color: #6658d3;
  color: white;
}
.text-center {
  text-align: center;
}
</style>