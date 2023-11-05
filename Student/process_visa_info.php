<?php
include_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $college = $_POST['college'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $guardian = $_POST['guardian'];
    $contact_no = $_POST['contact_no'];
    $course = $_POST['course'];
    $passport_number = $_POST['passport_no'];
    $date_of_issue = $_POST['date_of_issue'];
    $date_of_expiration = $_POST['date_of_expiration'];
    $visa_expiration = $_POST['visa_expiration'];
    $date_of_admission = $_POST['date_of_admission'];
    $status = $_POST['status'];
    $student_no = $_POST['student_no'];
    $record = $_POST['record'];
    $visa_status_passport = $_POST['visa_status_passport'];
    $visa_status = $_POST['visa_status'];

    $sql = "INSERT INTO stud_visa (COLLEGE, NAME, SEX, AGE, BIRTHDAY, NATIONALITY, ADDRESS, GUARDIAN, 
            CONTACT_NO, COURSE, PASSPORT_NUMBER, DATE_OF_ISSUE, DATE_OF_EXPIRATION, VISA_EXPIRATION, 
            DATE_OF_ADMISSION, STATUS, STUDENT_NO, RECORD, VISA_STATUS_PASSPORT, VISA_STATUS) 
            VALUES ('$college', '$name', '$sex', '$age', '$birthday', '$nationality', '$address', '$guardian', 
            '$contact_no', '$course', '$passport_number', '$date_of_issue', '$date_of_expiration', '$visa_expiration', 
            '$date_of_admission', '$status', '$student_no', '$record', '$visa_status_passport', '$visa_status')";
    
    if (mysqli_query($con, $sql)) {
        // Data saved successfully
        
        header("Location: EnterVisaInfo.php?success=1");
        exit();
    } else {
        // Error occurred while saving data
        echo "<script>alert('Please try again.'); window.history.go(-1);</script></script>";
        header("Location: EnterVisaInfo.php?error=1");
        exit();
    }
}
?>
