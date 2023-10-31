
<?php
@session_start();
include_once '../connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$sql="SELECT * FROM user where email = '$email' AND password = '$password'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>User Type</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['lname']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['type']}</td>
                            <td><a href=\"User/delete.php?data={$row['id']}\" class='btn btn-danger'>Delete</a></td>
                            <td><a href=\"#\" onclick=\"getPage('Edit.php?data={$row['id']}')\" class='btn btn-primary'>Edit</a></td>
                          </tr>";
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
