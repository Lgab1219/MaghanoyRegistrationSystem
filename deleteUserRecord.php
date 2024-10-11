<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/methods.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $getUserById = getUserById($pdo, $_GET['reg_id']);
    ?>
    <h1>Job Registration</h1>
    <h3>Website Developer</h3><br><br>
    <h3 style="color: red;">Are you sure you want to delete this user?</h3>
    <p>Registered ID: <?php echo $getUserById['reg_id']; ?></p>
    <p>First Name: <?php echo $getUserById['fname']; ?></p>
    <br>
    <p>Last Name: <?php echo $getUserById['lname']; ?></p>
    <br>
    <p>Gender: <?php echo $getUserById['gender']; ?></p>
    <br>
    <p>Course: <?php echo $getUserById['course']; ?></p>
    <br>
    <p>Religion: <?php echo $getUserById['religion']; ?></p>
    <br><br>
    <form action="core/handleForm.php?reg_id=<?php echo $getUserById['reg_id']; ?>" method="POST">
        <input type="submit" value="Delete" name="deleteBtn">
    </form>
</body>
</html>