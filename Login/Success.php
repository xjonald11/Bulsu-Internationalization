<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <h1 class="ml-5">Success</h1>
                <h2 class="text-success ml-5">You have successfully changed your password</h2>
            </div>
        </div>
    </div>

    <?php
    $loc = "./login.php";
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
