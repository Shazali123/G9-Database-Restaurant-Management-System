

<?php
include '../db.php';


        session_start();
	
	$name = $_POST['name'];
    $desc = $_POST['desc'];
	$price = $_POST['price'];
	
	$item = mysqli_query($conn, "INSERT INTO menu(item_name,item_desc,price) VALUES('$name','$desc','$price')");
	echo "<script>alert('Submitted Successfully'); window.location.href='menu.php';</script>";//the  window.location.href is where it lead to
        

?>

