<?php 

session_start();

require_once 'dbConfig.php';
require_once 'methods.php';

// Insert Button
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

    // Setting up query and executing it
    $query = "INSERT INTO registered (fname, lname, gender, course, religion, position)
    VALUES (?,?,?,?,?,?)";

    $statement = $pdo -> prepare($query);

    $executeQuery = $statement -> execute(
        [$_SESSION['fname'], $_SESSION['lname'], $_SESSION['gender'], $_SESSION['course'], 
        $_SESSION['religion'],  $_SESSION['position']]
    );

    // If a query is executed, increment 1 to the user id
    if($executeQuery){
        $_SESSION['reg_id'] = $pdo -> lastInsertId();
    } else {
        echo "Error";
    }

}

// Edit Button
if(isset($_POST['editBtn'])){
    $reg_id = $_GET['reg_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $religion = $_POST['religion'];
    $position = $_POST['position'];

    $query = editUserById($pdo, $reg_id, $fname, $lname, $gender, $course, $religion, $position);

    if($query){
        header('Location: ../index.php');
    } else {
        echo "Update failed!";
    }
}

// Delete Button
if(isset($_POST['deleteBtn'])){
    $reg_id = $_GET['reg_id'];

    $query = deleteUserById($pdo, $reg_id);

    if($query){
        header('Location: ../index.php');
    } else {
        echo "Deletion failed!";
    }
}

header('Location: ../index.php');
exit();

?>