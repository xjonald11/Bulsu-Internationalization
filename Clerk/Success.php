<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script>
        function getPage(url){
            $('#content').hide(1000,function(){
            $('#content').load(url);
            $('#content').show(1000,function(){});
            });
        }
    </script>
</head>
<body>
    <div id="wrap" class="container mt-5">
    <div id="header">
            <div class="logo text-center"> 
                <img src="../image/sc.png" class="img-responsive mx-auto" style="display:inline-block; max-height: 150px; margin-bottom:10px;" alt="Logo">
            </div>

        <div id="content">
            <h1 class="ml-4">Success</h1>
            <h2 class="text-success">You have successfully edited your information</h2>
        </div>

        <div id="footer">
            &copy;Jonald Acosta 2023
        </div>
    </div>
    
    <script>
        var loc = "./index.php";
        function refPage() {
            document.location = loc;
        }
        setInterval('refPage()', 2000);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
