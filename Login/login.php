<!DOCTYPE html>
<html>
<head>
    <title>Bulsu CMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script>
        function getPage(url) {
            $('#content').hide(1000, function () {
                $('#content').load(url);
                $('#content').show(1000, function () { });
            });
        }
    </script>
</head>
<style>
    body {
        background-image: url('../image/int3.jpg'); /* Specify the path to your image */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; /* This ensures the background image stays fixed even when scrolling */
    }

    h1 {
        color: #007bff;
    }

    img {
        vertical-align: middle;
    }

    #content {
        background: #19e0ff40; /* Adjusted background color with transparency */
        padding: 50px;
        border-radius: 10px;
        max-width: 500px; /* Adjusted max-width */
        margin: 0 auto; /* Centered horizontally */
    }

    .logo {
        text-align: center;
    }

    .logo img {
        display: inline-block;
        max-height: 150px;
        margin-bottom: 10px;
    }

    .login-content {
        max-width: 300px; /* Adjusted max-width for login form */
        margin: 0 auto; /* Centered horizontally */
        padding: 20px;
    }

    #error {
        color: #dc3545;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }
</style>

<body>
    <div id="wrap">
        <div id="header">
            <div class="logo text-center"> 
                <img src="../image/oia.png" class="img-responsive mx-auto" style="display:inline-block; max-height: 150px; margin-bottom:10px;" alt="Logo">
            </div>

            <div class="container mx-auto">
                <div id="content" class="login-content"> <!-- Added login-content class -->
                    <form name="Myform" id="Myform" action="loginProcess.php" method="post" onsubmit="return(Validate());">
                        <div id="error" class="text-danger font-weight-bold mb-3"></div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" onkeydown="HideError()">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeydown="HideError()">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                        </div>
                    </form>
               <!--     <div class="text-center">
                        <a href="#" onclick="getPage('forgetPassword.php')" class="text-success"><small>Forget your password?</small></a>
                    </div> -->
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</body>
</html>
