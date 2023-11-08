<?php
include_once 'StudentsSession.php';
include_once '../connection.php';

$uname = $_SESSION['email'];
$password = $_SESSION['password'];
$chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
$row = mysqli_fetch_array($chekUser);
$fname = $row['fname'];
$lname = $row['lname'];
$username = $fname . " ".$lname;

// Fetch user information from the database
$result = mysqli_query($con, "SELECT * FROM stud_visa ");

if($result) {
    $userInfo = mysqli_fetch_assoc($result);
} else {
    die(mysqli_error($con)); // This will show the exact error message for debugging
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for editing user info
    // Get the updated values from the form
    $updatedCollege = $_POST['COLLEGE'];
    $updatedName = $_POST['NAME'];
    $updatedSex = $_POST['SEX'];
    $updatedAge = $_POST['AGE'];
    $updatedBirthday = $_POST['BIRTHDAY'];
    $updatedNationality = $_POST['NATIONALITY'];
    $updatedAddress = $_POST['ADDRESS'];
    $updatedGuardian = $_POST['GUARDIAN'];
    $updatedContactNoGuardian = $_POST['CONTACT_NO_GUARDIAN'];
    $updatedCourse = $_POST['COURSE'];
    $updatedContactNoStudent = $_POST['CONTACT_NO_STUDENT'];
    $updatedPassportNumber = $_POST['PASSPORT_NUMBER'];
    $updatedDateOfIssue = $_POST['DATE_OF_ISSUE'];
    $updatedDateOfExpiration = $_POST['DATE_OF_EXPIRATION'];
    $updatedVisaExpiration = $_POST['VISA_EXPIRATION'];
    $updatedDateOfAdmission = $_POST['DATE_OF_ADMISSION'];
    $updatedStatus = $_POST['STATUS'];
    $updatedStudentNo = $_POST['STUDENT_NO'];
    $updatedRecord = $_POST['RECORD'];
    $updatedVisaStatusPassport = $_POST['VISA_STATUS_PASSPORT'];
    $updatedVisaStatusPassportDescription = $_POST['VISA_STATUS_PASSPORT_DESCRIPTION'];
    
    // Update the user information in the database
    $updateQuery = "UPDATE stud_visa SET 
                    COLLEGE = '$updatedCollege', 
                    NAME = '$updatedName', 
                    SEX = '$updatedSex', 
                    AGE = '$updatedAge', 
                    BIRTHDAY = '$updatedBirthday', 
                    NATIONALITY = '$updatedNationality', 
                    ADDRESS = '$updatedAddress', 
                    GUARDIAN = '$updatedGuardian', 
                    CONTACT_NO_GUARDIAN = '$updatedContactNoGuardian', 
                    COURSE = '$updatedCourse', 
                    CONTACT_NO_STUDENT = '$updatedContactNoStudent', 
                    PASSPORT_NUMBER = '$updatedPassportNumber', 
                    DATE_OF_ISSUE = '$updatedDateOfIssue', 
                    DATE_OF_EXPIRATION = '$updatedDateOfExpiration', 
                    VISA_EXPIRATION = '$updatedVisaExpiration', 
                    DATE_OF_ADMISSION = '$updatedDateOfAdmission', 
                    STATUS = '$updatedStatus', 
                    STUDENT_NO = '$updatedStudentNo', 
                    RECORD = '$updatedRecord', 
                    VISA_STATUS_PASSPORT = '$updatedVisaStatusPassport', 
                    VISA_STATUS_PASSPORT_DESCRIPTION = '$updatedVisaStatusPassportDescription'
                    WHERE EMAIL = '$uname'";
    
    if (mysqli_query($con, $updateQuery)) {
        // Data updated successfully
        header("Location: ViewEditInfo.php?success=1");
        exit();
    } else {
        // Error occurred while updating data
        header("Location: ViewEditInfo.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <title>Bulsu International</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">Bulsu Internationalization</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="About.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>About</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Files</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="RequestFile.php">Request File</a>
                        <a class="collapse-item" href="ViewRequests.php">View Request File</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ViewEditInfo.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Student VISA Info</span></a>
            </li> 

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="EnterVisaInfo.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Edit VISA Info</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ViewUser.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>My Profile</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../image/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container mt-5">
    <form action="" method="post">
        <div class="row">
        <div class="col-md-4">
                <div class="form-group">
                    <label for="NAME">Name</label>
        <input type="text" class="form-control" id="NAME" name="NAME" required>
    </div>
    </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="COLLEGE">College</label>
                        <select class="form-control" id="COLLEGE" name="COLLEGE" onkeydown="HideError()" required>
                            <option value="COLLEGE OF ARCHITECTURE AND FINE ARTS">COLLEGE OF ARCHITECTURE AND FINE ARTS</option>
                            <option value="COLLEGE OF ARTS AND LETTERS">COLLEGE OF ARTS AND LETTERS</option>
                            <option value="COLLEGE OF BUSINESS ADMINISTRATION">COLLEGE OF BUSINESS ADMINISTRATION</option>
                            <option value="COLLEGE OF CRIMINAL JUSTICE EDUCATION">COLLEGE OF CRIMINAL JUSTICE EDUCATION</option>
                            <option value="COLLEGE OF HOSPITALITY AND TOURISM MANAGEMENT">COLLEGE OF HOSPITALITY AND TOURISM MANAGEMENT</option>
                            <option value="COLLEGE OF INFORMATION AND COMMUNICATIONS TECHNOLOGY">COLLEGE OF INFORMATION AND COMMUNICATIONS TECHNOLOGY</option>
                            <option value="COLLEGE OF INDUSTRIAL TECHNOLOGY">COLLEGE OF INDUSTRIAL TECHNOLOGY</option>
                            <option value="COLLEGE OF LAW">COLLEGE OF LAW</option>
                            <option value="COLLEGE OF NURSING">COLLEGE OF NURSING</option>
                            <option value="COLLEGE OF ENGINEERING">COLLEGE OF ENGINEERING</option>
                            <option value="COLLEGE OF EDUCATION">COLLEGE OF EDUCATION</option>
                            <option value="COLLEGE OF SCIENCE">COLLEGE OF SCIENCE</option>
                            <option value="COLLEGE OF SPORTS, EXERCISE AND RECREATION">COLLEGE OF SPORTS, EXERCISE AND RECREATION</option>
                            <option value="COLLEGE OF SOCIAL SCIENCES AND PHILOSOPHY">COLLEGE OF SOCIAL SCIENCES AND PHILOSOPHY</option>
                        </select>
    </div>
    </div>
    <div class="col-md-4">
                <div class="form-group">
                    <label for="COURSE">Course</label>
    <select class="form-control" id="COURSE" name="COURSE" onkeydown="HideError()" required>
        <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
        <option value="Bachelor of Landscape Architecture">Bachelor of Landscape Architecture</option>
        <option value="Bachelor of Fine Arts Major in Visual Communication">Bachelor of Fine Arts Major in Visual Communication</option>
        <option value="Bachelor of Arts in Broadcasting">Bachelor of Arts in Broadcasting</option>
        <option value="Bachelor of Arts in Journalism">Bachelor of Arts in Journalism</option>
        <option value="Bachelor of Performing Arts (Theater Track)">Bachelor of Performing Arts (Theater Track)</option>
        <option value="Batsilyer ng Sining sa Malikhaing Pagsulat">Batsilyer ng Sining sa Malikhaing Pagsulat</option>
        <option value="Bachelor of Science in Business Administration Major in Business Economics">Bachelor of Science in Business Administration Major in Business Economics</option>
        <option value="Bachelor of Science in Business Administration Major in Financial Management">Bachelor of Science in Business Administration Major in Financial Management</option>
        <option value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
        <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
        <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
        <option value="Bachelor of Arts in Legal Management">Bachelor of Arts in Legal Management</option>
        <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
        <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
        <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
        <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
        <option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
        <option value="Bachelor of Science in Information System">Bachelor of Science in Information System</option>
        <option value="Bachelor of Laws">Bachelor of Laws</option>
        <option value="Juris Doctor">Juris Doctor</option>
        <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
        <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
        <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
        <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
        <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
        <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
        <option value="Bachelor of Science in Manufacturing Engineering">Bachelor of Science in Manufacturing Engineering</option>
        <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
        <option value="Bachelor of Science in Mechatronics Engineering">Bachelor of Science in Mechatronics Engineering</option>
        <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
        <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
        <option value="Bachelor of Secondary Education Major in English minor in Mandarin">Bachelor of Secondary Education Major in English minor in Mandarin</option>
        <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
        <option value="Bachelor of Secondary Education Major in Sciences">Bachelor of Secondary Education Major in Sciences</option>
        <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
        <option value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
        <option value="Bachelor of Secondary Education Major in Values Education">Bachelor of Secondary Education Major in Values Education</option>
        <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
        <option value="Bachelor of Technology and Livelihood Education Major in Industrial Arts">Bachelor of Technology and Livelihood Education Major in Industrial Arts</option>
        <option value="Bachelor of Technology and Livelihood Education Major in Information and Communication Technology">Bachelor of Technology and Livelihood Education Major in Information and Communication Technology</option>
        <option value="Bachelor of Technology and Livelihood Education Major in Home Economics">Bachelor of Technology and Livelihood Education Major in Home Economics</option>
        <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
        <option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
        <option value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>
        <option value="Bachelor of Science in Math with Specialization in Computer Science">Bachelor of Science in Math with Specialization in Computer Science</option>
        <option value="Bachelor of Science in Math with Specialization in Applied Statistics">Bachelor of Science in Math with Specialization in Applied Statistics</otion>
        <option value="Bachelor of Science in Math with Specialization in Business Applications">Bachelor of Science in Math with Specialization in Business Applications</option>
        <option value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching</option>
        <option value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education</option>
        <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
        <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
        <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
        </select>
        </div>
            </div>
 
    <div class="col-md-4">
                <div class="form-group">
        <label for="SEX">Sex</label>
        <select class="form-control" id="SEX" name="SEX" onkeydown="HideError()" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Prefer not to say">Prefer not to say</option>
    </select>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="AGE">Age</label>
        <input type="number" class="form-control" id="AGE" name="AGE" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="BIRTHDAY">Birthday</label>
        <input type="date" class="form-control" id="BIRTHDAY" name="BIRTHDAY" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="NATIONALITY">Nationality</label>
        <input type="text" class="form-control" id="NATIONALITY" name="NATIONALITY" required>
        </div>
    </div>


    <div class="col-md-4">
                <div class="form-group">
        <label for="ADDRESS">Address</label>
        <input type="text" class="form-control" id="ADDRESS" name="ADDRESS" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="GUARDIAN">Guardian</label>
        <input type="text" class="form-control" id="GUARDIAN" name="GUARDIAN" required>
        </div>
    </div>
    <div class="col-md-4">
                <div class="form-group">
        <label for="CONTACT_NO_GUARDIAN">Contact No. Guardian</label>
        <input type="text" class="form-control" id="CONTACT_NO_GUARDIAN" name="CONTACT_NO_GUARDIAN" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="CONTACT_NO_STUDENT">Contact No. Student</label>
        <input type="text" class="form-control" id="CONTACT_NO_STUDENT" name="CONTACT_NO_STUDENT" required>
        </div>
    </div>


    <div class="col-md-4">
                <div class="form-group">
        <label for="PASSPORT_NUMBER">Passport Number</label>
        <input type="text" class="form-control" id="PASSPORT_NUMBER" name="PASSPORT_NUMBER" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="DATE_OF_ISSUE">Date of Issue</label>
        <input type="date" class="form-control" id="DATE_OF_ISSUE" name="DATE_OF_ISSUE" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="DATE_OF_EXPIRATION">Date of Expiration</label>
        <input type="date" class="form-control" id="DATE_OF_EXPIRATION" name="DATE_OF_EXPIRATION" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="VISA_EXPIRATION">Visa Expiration</label>
        <input type="date" class="form-control" id="VISA_EXPIRATION" name="VISA_EXPIRATION" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="DATE_OF_ADMISSION">Date of Admission</label>
        <input type="date" class="form-control" id="DATE_OF_ADMISSION" name="DATE_OF_ADMISSION" required>
        </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
    <label for="STATUS">Status</label>
    <input type="text" class="form-control" id="STATUS" name="STATUS" required>
</div>

    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="STUDENT_NO">Student No.</label>
        <input type="text" class="form-control" id="STUDENT_NO" name="STUDENT_NO" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="RECORD">Record</label>
        <select class="form-control" id="SEX" name="RECORD" onkeydown="HideError()" required>
        <option value="1st year">1st year</option>
        <option value="2nd year">2nd year</option>
        <option value="3rd year">3rd year</option>
        <option value="4th year">4th year</option>
    </select>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="VISA_STATUS_PASSPORT">Visa Status (Passport)</label>
        <input type="text" class="form-control" id="VISA_STATUS_PASSPORT" name="VISA_STATUS_PASSPORT" required>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
        <label for="VISA_STATUS_PASSPORT_DESCRIPTION">Visa Status (Passport) Description</label>
        <select class="form-control" id="VISA_STATUS_PASSPORT_DESCRIPTION" name="VISA_STATUS_PASSPORT_DESCRIPTION" onkeydown="HideError()" required>
        <option value="DPA">DPA</option>
        <option value="Ph.D-B.A">Ph.D-B.A</option>
        <option value="MAED">MAED</option>
        <option value="MBA">MBA</option>
        <option value="CBA">CBA</option>
        <option value="CON">CON</option>
        <option value="COED">COED</option>
        <option value="COED PHYSICAL EDUCATION">COED PHYSICAL EDUCATION</option>
        <option value="CSSP">CSSP</option>
    </select>
        </div>
    </div>

    <div class="col-md-4">
                <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
</form>

    
                </div>
    
            </div>
            
    
        
    
<!-- /.container-fluid -->

</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Jonald C. Acosta 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>

