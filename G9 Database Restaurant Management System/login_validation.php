<?php

    include 'db.php';

        $password = $_POST['psw'];
        $email = $_POST['email'];
		
		
        $getStaff = mysqli_query($conn, "SELECT staff_id FROM staff WHERE staff_email='$email' AND password='$password'");
		if(mysqli_num_rows($getStaff) > 0){
    	$staffRow = mysqli_fetch_assoc($getStaff);
    	$staff_id = $staffRow['staff_id'];
		
    	
			
			
	
	if ($staff_id == '1') {
				 echo "<script>window.location.href='Admin/adminHome.php';</script>";
			}
	else if ($staff_id != '1')
			{
				 echo "<script>window.location.href='Staff/staffHome.php';</script>";
			}
     }
	    
    else {
            echo "<script>alert('Invalid Username or Password'); window.location.href='staff.php';</script>"; 
        }
    
    

?>






