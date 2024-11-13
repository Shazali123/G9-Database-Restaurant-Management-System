<?php

session_start();

include '../db.php';

$_SESSION['id'] = $_POST['id']; 
$id = $_SESSION['id'];
  

$query = "SELECT * FROM `orders_products` WHERE order_id ='$id'";

$getStatus = mysqli_query($conn, "SELECT * FROM `orders` WHERE id ='$id'");
$statusRow = mysqli_fetch_assoc($getStatus);
$status = $statusRow['status'];
$fullamount = $statusRow['fullamount'];


?>

<div class="container">
  <h2>Order <?php echo $id   ?></h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Order&nbsp;ID</div>
      <div class="col col-2">&nbsp;&nbsp;Product ID</div>
      <div class="col col-3">Product Name</div>
      <div class="col col-4">Quantity</div>
	  <div class="col col-5">Price</div>
	
    </li>
	<?php
	
	if ($result = $conn->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $order_id = $row["order_id"];
        $product_id = $row["product_id"];
        $product_name = $row["product_name"];
        $quantity = $row["quantity"];
        $price = $row["price"];

	echo "<li class='table-row'>";
    echo "<div class='col col-1' data-label='Order ID'>" .$order_id. "</div>";
	echo "<div class='col col-2' data-label='User ID'>" .$product_id. "</div>";
	echo "<div class='col col-3' data-label='Table No'>" .$product_name. "</div>";
	echo "<div class='col col-4' data-label='Date & Time'>" .$quantity. "</div>";
	echo "<div class='col col-5' data-label='Amount'>" . $price. "</div>";
      
    echo "</li>";
      
    }

/*freeresultset*/
$result->free();
}

   ?>
  </ul>
</div>

<h2>Current Status: <?php echo $status   ?></h2>

<h2>Total: RM<?php echo $fullamount   ?></h2>

<?php
if(isset($_POST['button1'])) { 
            echo "This is Button1 that is selected"; 
        } 
 ?>
 
 
 <form class="form-inline" action="staff4.php" method="post">
  <label for="id">Money Received:</label>
   <input type="number" step=".01" id="payment" name="payment" class="input-field"  required/>
  <input type="hidden" id="orderid" name="orderid" value= "<?php echo $id ?>">
  <button type="submit">Submit</button>
</form>


<style>
<?php include '../test4.css'; ?>
</style>