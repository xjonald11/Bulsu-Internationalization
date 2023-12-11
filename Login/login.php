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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" name="Myform" id="Myform" action="loginProcess.php" method="post" onsubmit="return(Validate());">
                                        <div id="error" class="text-danger font-weight-bold mb-3"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="uname" id="uname" placeholder="Username" onkeydown="HideError()">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" minlength="8" onkeydown="HideError()">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                                        </div>
                                        <!-- Within the form section -->
<div class="form-group text-center">
    <a href="forgetPassword.php">Forgot Password?</a>
</div>

    </div>
                                    </form>
                                    <hr>
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
