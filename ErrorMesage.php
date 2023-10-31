<!DOCTYPE html>
<html>
<head>
    <title>Foreign Travel Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
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
        font-family: Arial, sans-serif;
    }
    #wrap {
        margin: 0 auto;
        max-width: 600px;
    }
    #header {
        text-align: center;
        margin-bottom: 20px;
    }
    #content {
        text-align: center;
    }
    #footer {
        text-align: center;
    }
</style>
<body>
<div id="wrap">
        <div id="header">
            <div class="logo text-center"> 
                <img src="image/OIP.png" class="img-responsive mx-auto" style="display:inline-block; max-height: 150px; margin-bottom:10px;" alt="Logo">
            </div>

        <div id="content">
            <h2 style="color: red">Wrong Username or Password</h2>
        </div>

        <div class="clear"></div>

        <div id="footer">
            &copy;Jonald Acosta 2023
        </div>
    </div>

    <?php
        $loc = "Login/login.php";
        echo '<script> 
            function refPage() {
                var loc = "'.$loc.'";
                document.location = loc;
            }
            setInterval(\'refPage()\', 2000);
        </script>';
    ?>
</body>
</html>
