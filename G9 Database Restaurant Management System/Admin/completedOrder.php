<?php

session_start();

include '../db.php';
$query = "SELECT * FROM orders WHERE status = 'COMPLETED'";


?>

<nav class="menu">
		<a class="nav-item" style="padding: 1rem 1.5rem 1rem .5rem;" href="adminHome.php">
			<img src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" width="28px" height="28px" />
		</a>
		<a class="nav-item" href="staff_list.php">
			<img width="28" height="28" src="https://img.icons8.com/ios/50/list--v1.png" alt="list--v1"/>
		</a>
		<a class="nav-item" href="staff2.php">
			<img width="28" height="28" src="https://img.icons8.com/dusk/64/list--v1.png" alt="list--v1"/>
		</a>
		<a class="nav-item" href="menu.php">
			<img width="28" height="28" src="https://img.icons8.com/fluency/48/kawaii-bread-1.png" alt="kawaii-bread-1"/>
		</a>
		<a class="nav-item" style="padding: 1rem .5rem 1rem 1.5rem;" href="../staff.php">
			<img width="28" height="28" src="https://img.icons8.com/ios/50/emergency-exit.png" alt="emergency-exit"/>
		</a>
	</nav>
</main>

<br>

<form class="form-inline" action="staff3.php" method="post">
  <label for="id">Order ID:</label>
  <input type="number" id="id" name="id" placeholder="Enter id" />
  <button type="submit">Submit</button>
</form>

<form class="form-inline" action="staff2.php" method="post">
  <button type="submit">Current Orders</button>
</form>



<div class="container">
  <h2>Completed Orders</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Order&nbsp;ID</div>
      <div class="col col-2">&nbsp;&nbsp;User ID</div>
      <div class="col col-3">Table No</div>
      <div class="col col-4">Date & Time</div>
	  <div class="col col-5">Amount</div>
	  <div class="col col-6">Status</div>
	
    </li>
	<?php
	
	if ($result = $conn->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $user_id = $row["user_id"];
        $table_id = $row["table_id"];
        $date = $row["date"];
        $fullamount = $row["fullamount"];
		$status = $row["status"];
	

	echo "<li class='table-row'>";
    echo "<div class='col col-1' data-label='Order ID'>" .$id. "</div>";
	echo "<div class='col col-2' data-label='User ID'>" .$user_id. "</div>";
	echo "<div class='col col-3' data-label='Table No'>" .$table_id. "</div>";
	echo "<div class='col col-4' data-label='Date & Time'>" .$date. "</div>";
	echo "<div class='col col-5' data-label='Amount'>" .$fullamount. "</div>";
	echo "<div class='col col-6' data-label='Status'>" .$status. "</div>";
      
    echo "</li>";
      
    }

/*freeresultset*/
$result->free();
}

   ?>
  </ul>
</div>

<style>
<?php include '../test4.css'; ?>
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");

body {

}

a {
	text-decoration: none;
	font-family: Roboto, sans-serif;
	font-size: 1em;
	display: flex;
	flex-direction: column;
	justify-content: center;
	transition-duration: 0.2s;
	align-items: center;
	padding: 1rem 1.5rem;
}

img {
	transition-duration: 0.2s;
}

a:hover img {
	animation: left-edge 0.5s linear 1;
	filter: invert(72%) sepia(20%) saturate(747%) hue-rotate(174deg)
		brightness(96%) contrast(97%);
}

img:hover .menu {
	box-shadow: 0px 10px 5px rgb(100, 187, 241, 0.1);
}

.menu {
	display: flex;
	justify-content: space-between;
	align-items: center;
	position: relative;
	width: auto;
	height: 60px;
	padding: 0 15px;
	border-radius: 15px;
	background: rgb(255, 255, 255);
	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
}

.dot {
	animation: dot-anim 8s linear infinite;
}

/* Animations */

@keyframes dot-anim {
	0% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.5);
	}
	100% {
		transform: scale(1);
	}
}

@keyframes left-edge {
	0% {
		transform: rotate(0deg);
	}
	35% {
		transform: rotate(-25deg);
	}
	75% {
		transform: rotate(25deg);
	}
	100% {
		transform: rotate(0deg);
	}
}
</style>