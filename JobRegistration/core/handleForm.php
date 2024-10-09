<?php 

session_start();

require_once 'dbConfig.php';

if(isset($_POST['registerBtn'])){
    
    // Prepare variables
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $religion = $_POST['religion'];
    $position = $_POST['position'];

    // Setting up session variables
    $_SESSION['fname'] = $firstName;
    $_SESSION['lname'] = $lastName;
    $_SESSION['gender'] = $gender;
    $_SESSION['course'] = $course;
    $_SESSION['religion'] = $religion;
    $_SESSION['position'] = $position;

    $query = "INSERT INTO registered (first_name, last_name, gender, course, religion, position)
    VALUES (?,?,?,?,?,?)";

    $statement = $pdo -> prepare($query);

    $executeQuery = $statement -> execute(
        [$_SESSION['fname'], $_SESSION['lname'], $_SESSION['gender'], $_SESSION['course'], 
        $_SESSION['religion'],  $_SESSION['position']]
    );

}

header('Location: ../index.php');
exit();

?>