<?php

include 'db.php';

session_start();

 date_default_timezone_set("Asia/Kuala_Lumpur");
 $date = date('Y-m-d H:i:s'); //Returns IST dmY

$_SESSION['table'] = $_POST['table']; 
  
$_SESSION['cusno'] = $_POST['cusno']; 
  
$_SESSION['email'] = $_POST['email']; 

$table = $_SESSION['table'];

$number = $_SESSION['cusno'];

$email = $_SESSION['email'];


$getUser = mysqli_query($conn, "SELECT customer_id FROM customer WHERE customer_email='$email'");
$customerRow = mysqli_fetch_assoc($getUser);
$userid = $customerRow['customer_id'];
//retrieve customer id

$status = "NEW";

$orders = mysqli_query($conn, "INSERT INTO orders(user_id,table_id,date,status) VALUES('$userid','$table','$date','$status')");

$getOrderId = mysqli_query($conn, "SELECT id FROM orders WHERE date = '$date'");
$orderIdRow = mysqli_fetch_assoc($getOrderId);
$order_id = $orderIdRow['id'];


	$fullamount = 0;
	
	$subtotal = 0;
		
	
	if (isset($_POST['save'])) {
    $count = $_POST['count'];
    for ($i = 0; $i < $count; $i++) {
	
        $qty = $_POST['qty'][$i];
		$item_id = $_POST['item_id'][$i];
		$item_desc = $_POST['item_desc'][$i];
		$item_name = $_POST['item_name'][$i];
		$price = $_POST['price'][$i]; // check empty and check if interger
		
		
		if ($qty > 0){
		$subtotal = $subtotal + ($price * $qty);
		$item = mysqli_query($conn, "INSERT INTO orders_products(order_id,product_id,product_name,quantity,price) VALUES('$order_id','$item_id','$item_name','$qty','$price')");
		}
    }	

}


$tax = (5/100) * $subtotal;
	
$fullamount = $tax + $subtotal;


$orders = mysqli_query($conn, "UPDATE orders SET fullamount = '$fullamount' WHERE date = '$date';");


$query = "SELECT * FROM orders_products WHERE order_id='$order_id'";



		
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Restaurant Fauzan</strong>
                        <br>
                        Sabah
                        <br>
                        Malaysia
                        <br>
                        <abbr title="Phone">P:</abbr> no
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo $date ?></em>
                    </p>
                    <p>
                        <em>Receipt #: <?php echo $order_id ?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					
					if ($result = $conn->query($query)) {

				    while ($row = $result->fetch_assoc()) {
				    $product_name = $row["product_name"];
				    $quantity = $row["quantity"];
				    $price = $row["price"];
					
					$sum = $quantity * $price;
				       
	 				 ?>
                        	<tr>
                            <td class="col-md-9"><em><?php echo $product_name; ?> </em></h4></td>
                            <td class="col-md-1" style="text-align: center"> <?php echo $quantity; ?> </td>
                            <td class="col-md-1 text-center"><?php echo $price; ?> </td>
                        	<td class="col-md-1 text-center">RM<?php echo $sum; ?></td>
							
							
                        </tr>
						<?php 
 
						 
						    }
							}
							
							
						?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>5% Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>	
								 <?php 
                                echo "<strong>RM".number_format((float)$subtotal, 2, '.','')."</strong>";
								?>
                            </p>
                            <p>
                                 <?php 
                                echo "<strong>RM".number_format((float)$tax, 2, '.','')."</strong>";
								
								?>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong> RM<?php echo number_format((float)$fullamount, 2, '.',''); ?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay at Counter   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
				<br>
				<form class="form-inline" action="3.php" method="post">
  				<input type="hidden" id="table" name="table" value= "<?php echo $table ?>">
  				<input type="hidden" id="email" name="email" value= "<?php echo $email ?>">
				<input type="hidden" id="cusno" name="cusno" value= "<?php echo $number ?>">
  				<button class="btn btn-success btn-lg btn-block"  type="submit">Order Again <span class="glyphicon glyphicon-chevron-right"></span></button> 
				</form>
            </div>
        </div>
    </div>
	
	
<style>
<?php include 'test2.css'; ?>


</style>

 

