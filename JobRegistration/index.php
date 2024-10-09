<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Job Registration</h1>
    <h3>Website Developer</h3>
    <form action="core/handleForm.php" method="POST">
        <label for="fname">First Name</label>
        <input type="text" name="fname">
        <br><br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname">
        <br><br>
        <label for="gender">Gender</label>
        <select name="gender">
            <option value="---" selected>---</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br><br>
        <label for="course">Course</label>
        <input type="text" name="course">
        <br><br>
        <label for="religion">Religion</label>
        <input type="text" name="religion">
        <br><br>
        <label for="position">Desired Position</label>
        <select name="position">
            <option value="frontend">Front-End Developer</option>
            <option value="backend">Back-End Developer</option>
            <option value="fullstack">Full Stack Developer</option>
        </select>
        <br><br>
        <input type="submit" value="Submit" name="registerBtn">
    </form>
    <br><br><br><br>
    <?php session_start(); 
        if(isset($_POST['registerBtn'])){
            // Fetching all data from the database
            $query = "SELECT * FROM registration";

            $statement = $pdo -> prepare($query);
            $executeQuery = $statement -> execute();

            if($executeQuery){
                $data = $statement -> fetchAll();
            } else {
                echo "Query failed!";
            }
                    }
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Religion</th>
            <th>Position</th>
            <th>Date Registered</th>
        </tr>
        <?php foreach($data as $row) { ?>
        <tr>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['religion']; ?></td>
            <td><?php echo $row['position']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <button><a href="core/unset.php" style="text-decoration: none; color: black;">Reset</a></button>
</body>
</html>