<?php  
session_start(); // Establish connection to the current session

require_once 'dbConfig.php';

// Delete all data from the table
$query = "DELETE FROM  registered";

$statement = $pdo -> prepare($query);

$executeQuery = $statement -> execute();

if($executeQuery){
    $resetQuery = "ALTER TABLE registered AUTO_INCREMENT = 0";
    $statement = $pdo -> prepare($resetQuery);
    $statement -> execute();
}

session_unset(); // Delete all session variables
header('Location: ../index.php'); // Go back to homepage
?>