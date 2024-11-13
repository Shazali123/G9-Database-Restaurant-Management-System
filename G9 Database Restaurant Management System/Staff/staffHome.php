<?php

session_start();

include '../db.php';

  
?>

<!DOCTYPE html>
<html>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<nav class="nav">
  <input id="menu" type="checkbox">
  <label for="menu">Home</label>
  <ul class="menu">
    <li>
      <a href="staff2.php">
        <span>Orders</span>
       <i class="fas fa-tasks" aria-hidden="true"></i>
      </a>
    </li>
    <li>
      <a href="staff_list2.php">
        <span>Staff</span>
         <i class="fas fa-address-card" aria-hidden="true"></i>
      </a>
    </li>
    <li>
      <a href="menu.php">
        <span>Menu</span>
       <i class="fa fa-bars" aria-hidden="true"></i>
      </a>
    </li>
    <li>
      <a href="../staff.php">
        <span>Log out</span>
         <i class="fa fa-undo" aria-hidden="true"></i>
      </a>
    </li>
  </ul>
</nav>



</body>
</html>


<style>
<?php include '../test5.css'; ?>
</style>