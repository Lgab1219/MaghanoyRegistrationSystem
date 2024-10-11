<?php 
require_once 'dbConfig.php';

// Fetching all data from the database
function getAllUsers($pdo){
    $query = "SELECT * FROM registered";
    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute();
    if($executeQuery){
        $data = $statement -> fetchAll();
    } else {
        echo "Query failed!";
    }
}


function getUserById($pdo, $reg_id){
    $fetchQuery = "SELECT * FROM registered WHERE reg_id = ?";

    $statement = $pdo -> prepare($fetchQuery);

    if($statement -> execute([$reg_id])){
        return $statement -> fetch();
    }
}

function editUserById($pdo, $reg_id, $fname, $lname, $gender, $course, $religion, $position){
    $editQuery = "UPDATE registered SET 
    fname = ?,
    lname = ?,
    gender = ?,
    course = ?,
    religion = ?,
    position = ?
    WHERE reg_id = ?";

    $statement = $pdo -> prepare($editQuery);

    $statement -> execute(
        [$fname, $lname, $gender, $course, $religion, $position, $reg_id]);
}


function deleteUserById($pdo, $reg_id){
    $deleteQuery = "DELETE FROM registered WHERE reg_id = ?";

    $statement = $pdo -> prepare($deleteQuery);

    $statement -> execute(
        [$reg_id]
    );
}

?>