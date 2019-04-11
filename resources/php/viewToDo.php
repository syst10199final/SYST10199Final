<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View To-Do</title>
        <link rel="stylesheet" type="text/css" href="resources/css/master.css">

    </head>
    <body>
        <nav>
            <img id="logo" src="resources/images/Logo.svg" alt="logo" draggable="false">
				
	</nav>
        <br><br><br><br><br>
        <?php
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        if ($_SESSION['username'] != NULL)
            $loggedInUser = $_SESSION['username'];

        $command = "SELECT Description, Priority, Due_Date from toDoList where Username = '$loggedInUser' ";
        $stmt = $dbh->prepare($command); //prepare PDO statement ";
        $execOk = $stmt->execute(); //execute the statement  "
        echo '<table><th>Task</th><th>Priority</th><th>Due Date</th>';
        if ($execOk) { //Check if error executing query   "
            while ($row = $stmt->fetch())
                echo '<tr><td>' . $row[0] . '</td><td> ' . $row[1] . '</td><td> ' . $row[2] . '</td></tr>';
            echo '</table><br><br>';
            if ($stmt->rowCount() == 0)
            echo 'No TO-DOs to Display<br><br>';
            echo '<button  id="a"><a id="a" href="employee.php">Go Back</a></button>';
        } else
            echo 'Error executing query: ';
        ?>
    </body>
</html>
