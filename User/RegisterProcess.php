<?php
include_once '../connection.php';
session_start();

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $phone = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);

    // Check if the email already exists in the database
    $check_query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('Email already exists!'); window.history.go(-1);</script>";
        exit();
    }

    // Generate a temporary password based on user details
    $lastFourDigits = substr($phone, -4);
    $password = $fname . $lname . $lastFourDigits;
    $hashedPassword = md5($password);

    // Insert new user data into the database
    $insert_query = "INSERT INTO user (fname, lname, phone, email, password, type) VALUES ('$fname','$lname','$phone','$email','$hashedPassword','$usertype')";
    $result = mysqli_query($con, $insert_query);

    if ($result) {
        $_SESSION['registration_success'] = true;
        echo "<script>alert('Registration Successful!'); window.location.href = 'Registration.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error occurred during registration: " . mysqli_error($con) . "'); window.history.go(-1);</script>";
        exit();
    }
} else {
    header("Location: Registration.php");
    exit();
}
?>
