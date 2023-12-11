<?php
include_once '../connection.php';
session_start();
$_SESSION['registration_success'] = true;

// Redirect back to the registration page or wherever you need to go
header("Location: Registration.php");
exit();
if(isset($_POST['submit'])){
    $fname = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['fname'])));
    $lname = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['lname'])));
    $phone = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['mobile'])));
    $email = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['email'])));
    $Usertype = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['usertype'])));
   // Check if email already exists
   $check_query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
   if (mysqli_num_rows($check_query) > 0) {
       // Email already exists, handle accordingly (show error, redirect, etc.)
       echo "<script>alert('Email already exists!'); window.history.go(-1);</script>";
       exit(); // Stop further execution
   }
   if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($check_query) > 0) {
        echo 'exist';
    } else {
        echo 'not_exist';
    }
}
   // Proceed with insertion if email doesn't exist
   // ... (password generation, hashing, and insertion code)

   // If insertion is successful
   if ($insertqry) {
       echo "<script>alert('Success!'); window.history.go(-1);</script>";
   }

    $lastFourDigits = substr($phone, -4);


    $password = $fname . $lname . $lastFourDigits;


    $hashedPassword = md5($password);

    $insertqry = mysqli_query($con,"INSERT INTO user (fname, lname, phone, email, password, type) VALUES ('$fname','$lname','$phone','$email','$hashedPassword','$Usertype')") or die(mysqli_error($con));

    if($insertqry) {
        echo "<script>alert('Success!'); window.history.go(-1);</script>";
    }
}
?>
<!-- Add this script to your RegisterProcess.php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#email').blur(function() {
            var email = $(this).val();
            $.ajax({
                url: 'check_email.php', // Path to the PHP file handling the email check
                method: 'POST',
                data: {
                    email: email
                },
                success: function(data) {
                    if (data === 'exist') {
                        $('#email').addClass('exist-error');
                    } else {
                        $('#email').removeClass('exist-error');
                    }
                }
            });
        });
    });
</script>