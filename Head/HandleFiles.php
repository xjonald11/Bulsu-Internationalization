<?php

include_once 'HeadSession.php';
include '../connection.php';

if ($_SESSION['type'] != 'Head') {
    header('location: ../Login/login.php');
    exit();
}

if(isset($_POST['submit'])) {
    $fileId = $_POST['file_id'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE upload SET status = '$status' WHERE id = $fileId";
    mysqli_query($con, $updateQuery) or die(mysqli_error($con));
}

$query = "SELECT * FROM upload WHERE status = 'Pending'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Head Actions</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Files Pending Approval</h2>
    <table>
        <tr>
            <th>File ID</th>
            <th>File Name</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="file_id" value="<?php echo $row['id']; ?>">
                        <select name="status">
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                        </select>
                        <input type="submit" name="submit" value="Update">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../Logout/logout.php">Logout</a>
</body>
</html>
