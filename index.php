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
        // Fetching all data from the database
        $query = "SELECT * FROM registered";
        $statement = $pdo -> prepare($query);
        $executeQuery = $statement -> execute();
        if($executeQuery){
            $data = $statement -> fetchAll();
        } else {
            echo "Query failed!";
        }
        
        if(!empty($data)){
            echo '
        <table style="border-style: solid; border-width: 2px; margin-top: 10px; height: 50px;">
        <tr style="border-style: solid; border-width: 2px;">
            <th style="border-style: solid; border-width: 2px; padding: 5px;">ID</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">First Name</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Last Name</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Gender</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Course</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Religion</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Position</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Date Registered</th>
            <th style="border-style: solid; border-width: 2px; padding: 5px;">Action</th>
        </tr>';

            foreach($data as $row){
                echo '<tr>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['reg_id'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['fname'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['lname'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['gender'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['course'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['religion'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['position'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">' . $row['date_registered'] . '</td>
                <td style="border-style: solid; border-width: 2px; padding: 5px;">
                <button><a href="editUserRecord.php?reg_id=' . $row['reg_id'] . '" style="text-decoration: none; color: black;"> Edit </a></button>
                <button><a href="deleteUserRecord.php?reg_id=' . $row['reg_id'] . '" style="text-decoration: none; color: black;"> Delete </a></button>
                ';  
            }

            echo '
            </tr>
            </table>';
        }
    ?>
    <br><br>

    <button><a href="core/unset.php" style="text-decoration: none; color: black;">Reset</a></button>
</body>
</html>