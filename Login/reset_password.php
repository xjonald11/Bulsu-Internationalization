<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
   
   <!-- Custom fonts for this template-->
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<style>
        body {
            background: url("../image/int3.jpg") no-repeat center center fixed;
            background-size: cover;
        }
        body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));
    z-index: -1;
}

.bg-login-image {
  background: url("../image/oia.png");
  background-position: center;
  background-size: cover;

}
.row {
    padding: 15px;

}

</style>
</head>
<body>

    <!-- This section handles the "Reset Password" process -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                        </div>
                        <form class="user" name="ResetPasswordForm" id="ResetPasswordForm" action="reset_password_process.php" method="post">
                            <div id="resetPasswordError" class="text-danger font-weight-bold mb-3"></div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="otp" id="otp" placeholder="Enter OTP" onkeydown="HideResetPasswordError()" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="newPassword" id="newPassword" placeholder="New Password" minlength="8" onkeydown="HideResetPasswordError()" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" name="submit" value="Reset Password" onclick="return ValidateResetPassword(event);" />
                            </div>
                            <div class="form-group text-center">
                                <a href="login.php">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Your script tag and other necessary JavaScript remains the same -->

    <script>
    function ValidateResetPassword(event) {
        var otp = document.getElementById('otp').value;
        var newPassword = document.getElementById('newPassword').value;
        var resetPasswordError = document.getElementById('resetPasswordError');

        if (otp.length !== 6) {
            resetPasswordError.innerText = "Please enter a valid OTP.";
            event.preventDefault(); // Prevent form submission
            return false;
        }

        if (newPassword.length < 8) {
            resetPasswordError.innerText = "Password must be at least 8 characters long.";
            event.preventDefault(); // Prevent form submission
            return false;
        }

        // Additional validation logic can be added here if needed

        // For demonstration purposes, showing an alert that password has been reset
        alert('Password has been reset successfully.');

        // Redirecting to the login page after resetting the password
        window.location.href = 'login.php';
        return true; // Allow form submission
    }

    function HideResetPasswordError() {
        document.getElementById('resetPasswordError').innerText = "";
    }
</script>


</body>
</html>
