<?php
session_start();
ob_start();
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = htmlentities(stripslashes(mysqli_real_escape_string($con, $_POST['uname'])));
    $password = htmlentities(stripslashes(mysqli_real_escape_string($con, $_POST['password'])));

    // Hash the entered password for comparison
    $hashedPassword = md5($password);

    $userqry = mysqli_query($con, "SELECT * FROM user WHERE email = '$uname'") or die(mysqli_error($con));
    $countUser = mysqli_num_rows($userqry);

    if ($countUser == 1) {
        $row = mysqli_fetch_array($userqry);
        // Compare the hashed entered password with the stored hashed password
        if ($row['password'] === $hashedPassword) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type'] = $row['type'];

            switch ($_SESSION['type']) {
                case 'Admin':
                    header('location:../index.php');
                    break;
                case 'Director':
                    header('location:../Director/index.php');
                    break;
                case 'Head':
                    header('location:../Head/index.php');
                    break;
                case 'Clerk':
                    header('location:../Clerk/index.php');
                    break;
                case 'Students':
                    header('location:../Student/index.php');
                    break;
                default:
                    header('location:../ErrorMesage.php');
            }
        } else {
            echo "<script>alert('Invalid username or password. Please try again.'); window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password. Please try again.'); window.history.go(-1);</script>";
    }
}

ob_end_flush();
?>
