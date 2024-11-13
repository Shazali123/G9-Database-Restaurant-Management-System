<?php

include '../db.php';

session_start();

 date_default_timezone_set("Asia/Kuala_Lumpur");
 $date = date('Y-m-d H:i:s'); //Returns IST dmY

$_SESSION['payment'] = $_POST['payment']; 
  
$_SESSION['orderid'] = $_POST['orderid']; 
  


$payment = $_SESSION['payment'];

$orderid = $_SESSION['orderid'];


$query = "SELECT * FROM orders_products WHERE order_id = '$orderid'";

	
	
	$fullamount = 0;

	$subtotal = 0;
	
	
	

	

		
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
                        <em>Receipt #: <?php echo $orderid ?></em>
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
			     $order_id = $row["order_id"];
			     $product_id = $row["product_id"];
			     $product_name = $row["product_name"];
			     $quantity = $row["quantity"];
			     $price = $row["price"];
				 
				 echo "<tr>";
			     echo "<td class='col-md-9'><em>". $product_name."</em></h4></td>";
			     echo "<td class='col-md-1' style='text-align: center'> ".$quantity." </td>";
			     echo "<td class='col-md-1 text-center'>RM".$price."</td>";
				 $total = $quantity * $price;
			     echo "<td class='col-md-1 text-center'>RM". $total."</td>";
      			 echo "</tr>";
				 $subtotal = $subtotal + $total;
  
      
    }

/*freeresultset*/
$result->free();
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
								 $tax = (5/100) * $subtotal;
	
								$fullamount = $tax + $subtotal;
								$change = $payment - $fullamount;
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
                    Change: RM<?php echo number_format((float)$change, 2, '.',''); ?> 
                </button></td>
				<br>
				<form action="staff2.php" method="post">
				<?php
				$update = mysqli_query($conn, "UPDATE orders SET status ='COMPLETED' WHERE id = '$orderid'");
				?>
				<button type="submit"  class="btn btn-success btn-lg btn-block">
                    Complete Payment <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
				</form>
				</a>
            </div>
        </div>
    </div>
	
	
	
	
<style>
<?php include '../test2.css'; ?>


</style>