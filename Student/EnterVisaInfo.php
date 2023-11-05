<?php
include_once 'StudentsSession.php';
include_once '../connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $college = $_POST['COLLEGE'];  // Corrected the variable names
    $name = $_POST['NAME'];
    $sex = $_POST['SEX'];
    $age = $_POST['AGE'];
    $birthday = $_POST['BIRTHDAY'];
    $nationality = $_POST['NATIONALITY'];
    $address = $_POST['ADDRESS'];
    $guardian = $_POST['GUARDIAN'];
    $contact_no_guardian = $_POST['CONTACT_NO_GUARDIAN'];
    $course = $_POST['COURSE'];
    $contact_no_student = $_POST['CONTACT_NO_STUDENT'];
    $passport_number = $_POST['PASSPORT_NUMBER'];
    $date_of_issue = $_POST['DATE_OF_ISSUE'];
    $date_of_expiration = $_POST['DATE_OF_EXPIRATION'];
    $visa_expiration = $_POST['VISA_EXPIRATION'];
    $date_of_admission = $_POST['DATE_OF_ADMISSION'];
    $status = $_POST['STATUS'];
    $student_no = $_POST['STUDENT_NO'];
    $record = $_POST['RECORD'];
    $visa_status_passport = $_POST['VISA_STATUS_PASSPORT'];
    $visa_status_passport_description = $_POST['VISA_STATUS_PASSPORT_DESCRIPTION'];

    $sql = "INSERT INTO stud_visa (college, name, sex, age, birthday, nationality, address, guardian, 
            contact_no_guardian, course, contact_no_student, passport_number, date_of_issue, date_of_expiration, 
            visa_expiration, date_of_admission, status, student_no, record, visa_status_passport, 
            visa_status_passport_description) 
            VALUES ('$college', '$name', '$sex', '$age', '$birthday', '$nationality', '$address', 
            '$guardian', '$contact_no_guardian', '$course', '$contact_no_student', '$passport_number', 
            '$date_of_issue', '$date_of_expiration', '$visa_expiration', '$date_of_admission', '$status', 
            '$student_no', '$record', '$visa_status_passport', '$visa_status_passport_description')";

    if (mysqli_query($con, $sql)) {
        // Data saved successfully
        header("Location: EnterVisaInfo.php?success=1");
        exit();
    } else {
        // Error occurred while saving data
        header("Location: EnterVisaInfo.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BULSU CMS - Enter Visa Info</title>
    <link rel="icon" href="../image/oia.png" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
        }

        .container-fluid {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .row.flex-grow-1 {
            flex-grow: 1;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="../image/oia.png" alt="Logo" height="50">
        BULSU Internationalization
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a href="Gallery.php" class="nav-link" >Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <span class="nav-link"><?php echo $email?></span>
            </li>
        </ul>
    </div>
</nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    
                </div>
            </div>
        </div>
        <div class="row flex-grow-1">
            <div class="col-md-2 bg-light">
                <ul class="list-unstyled">
                <li><a href=""></a></li>
                <li><a href="RequestFile.php">Request file</a></li>
                    <li><a href="ViewRequests.php">View Request file</a></li>
                    <li><a href="EnterVisaInfo.php">Student Info</a></li>
                    <li><a href="ViewEditInfo.php">Edit Info</a></li>
                    <li><a href="ViewUser.php">My Profile</a></li>
                </ul>
            </div>
            <div class="col-md-10">
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
        <label for="SEX">Gender</label>
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
            
    
        </div>
      
    </div>
 <!--   <footer class="mt-auto text-center bg-dark text-white py-3">
    <div class="container">
        <span class="text-muted">&copy; Jonald Acosta 2023</span>
    </div>
</footer> -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Registration.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

</body>

</html>
