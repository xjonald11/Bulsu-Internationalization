<?php
    if(isset($_POST['submit'])){
        session_start();
        ob_start();
        include '../connection.php';
        
        $uname = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['uname'])));
        $password = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['password'])));
        
        $userqry = mysqli_query($con,"select * from user where email = '$uname' AND password = '$password'") or die(mysqli_error($con));
        $countUser = mysqli_num_rows($userqry);
        
        if($countUser == 1) {
            $row = mysqli_fetch_array($userqry);
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
            echo "<script>alert('Invalid username or password. Please try again.'); window.history.go(-1);</script></script>";
        }

        ob_end_flush();       
    }
?>
