

<?php
include '../db.php';

    //Register for Staff
    if(isset($_POST['staffRegister'])){
        $name = $_POST['username'];
        $psw = $_POST['password'];
       

        session_start();

        $getStaff = mysqli_query($conn, "SELECT * FROM staff WHERE staff_email='$name'");
        if(mysqli_num_rows($getStaff) > 0){
            echo "<script>alert('The staff already has an account'); window.history.back();</script>";
        }
        else{
            $registerStaff = mysqli_query($conn, "INSERT INTO staff(staff_email,password) VALUES('$name','$psw')");
            $staff_id = mysqli_insert_id($conn);         
        }


        if($registerStaff){
            $_SESSION["staff_id"] = $staff_id;
            echo "<script>alert('Registered Successfully'); window.location.href='staff_list.php';</script>";//the  window.location.href is where it lead to
        }
        else{
            $error = mysqli_error($conn);// to check , could it connect to database
            echo "<script>alert('$error'); window.history.back();</script>";//window.history.back() equal to go 1 page back
        }
    }
    else{
        echo "<script>alert('Not authorized'); window.location.href='staff_list.php';</script>";
    }

?>

