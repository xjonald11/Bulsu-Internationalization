<!DOCTYPE html>
<html>
<head>
    <title>Foreign Travel Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <form name="Myform" id="Myform" action="forgetProcess.php" method="post" onsubmit="return(Validate());">
            <div id="error" class="text-danger font-weight-bold mb-3"></div>

            <div class="form-group row">
                <label for="fname" class="col-sm-4 col-form-label text-right font-weight-bold">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="fname" id="fname" onkeydown="HideError()">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label text-right font-weight-bold">Phone number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="mobile" id="password" onkeydown="HideError()">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label text-right font-weight-bold">New Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="password" maxlength="8" onkeydown="HideError()">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-primary" name="submit" value="Change Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a href="login.php" class="text-success"><i>&lt;&lt; Back</i></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
