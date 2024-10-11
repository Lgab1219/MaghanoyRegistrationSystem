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
    <h3>Website Developer</h3>
    <form action="core/handleForm.php?reg_id=<?php echo $getUserById['reg_id']; ?>" method="POST">
        <label for="fname">First Name</label>
        <input type="text" name="fname" value="<?php echo $getUserById['fname']; ?>">
        <br><br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" value="<?php echo $getUserById['lname']; ?>">
        <br><br>
        <label for="gender">Gender</label>
        <select name="gender" selected="<?php echo $getUserById['gender']; ?>">
            <option value="----" selected>----</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br><br>
        <label for="course">Course</label>
        <input type="text" name="course" value="<?php echo $getUserById['course']; ?>">
        <br><br>
        <label for="religion">Religion</label>
        <input type="text" name="religion" value="<?php echo $getUserById['religion']; ?>">
        <br><br>
        <label for="position">Desired Position</label>
        <select name="position">">
            <option value="----" selected>----</option>
            <option value="frontend">Front-End Developer</option>
            <option value="backend">Back-End Developer</option>
            <option value="fullstack">Full Stack Developer</option>
        </select>
        <br><br>
        <input type="submit" value="Update" name="editBtn">
    </form>
</body>
</html>