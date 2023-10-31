<?php
    include_once '../connection.php';
    $id = $_REQUEST['data'];
    $qry = mysqli_query($con,"Select * from user where id='$id'") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($qry)){
        $id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="Registration.js"></script>
</head>
<body>
<script type="text/javascript" src="Registration.js"></script>
<script type="text/javascript"></script>
<div class="container mt-5">
    <h2 class="text-center">Edit Your Information</h2>
    <form name="Myform" id="Myform" action="EditProcess.php?id='<?php echo $id; ?>'" method="post" onsubmit="return(Validate());">
        <div id="error" class="text-danger font-weight-bold mb-3"></div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" name="fname" id="fname" onkeydown="HideError()" value="<?php echo $fname ?>" />
                </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" class="form-control" name="lname" id="lname" onkeydown="HideError()" value="<?php echo $lname ?>" />
                </div>
                <div class="form-group">
                    <label for="mobile">Phone number</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" onkeydown="HideError()" value="<?php echo $phone ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" name="email" id="email" onkeydown="HideError()" value="<?php echo $email ?>" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" onkeydown="HideError()" />
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update" />
                </div>
            </div>
        </div>
    </form>
</div>
