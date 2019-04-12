<?php
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<!--
Page allowing for viewing of existing TO-DOs.

@author Mohammad Shoeb
-->
<html>
    <head>
        <title>View To-Do</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>
    <body>
        <nav>
            <img id="logo" src="../images/Logo.svg" alt="logo" draggable="false">
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="../../Pages/todo.html">Add a TO-DO</a>
                <a href="../../Pages/delete.html">Delete a TO-DO</a>
            </section>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <a href="logout.php">Log Out</a>
            </section>
        </nav>
        <main id="page-wrapper">
            <?php
            try {
                $dbConn = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
            } catch (PDOException $e) {
                echo 'Connection error: ' . $e->getMessage();
            }

            if ($_SESSION['username'] != NULL)
                $loggedInUser = $_SESSION['username'];

            $command = "SELECT Description, Priority, Due_Date from toDoList where Username = '$loggedInUser' ";
            $stmt = $dbConn->prepare($command);
            $execOk = $stmt->execute();
            echo '<table><th>Task</th><th>Priority</th><th>Due Date</th>';
            if ($execOk) {
                while ($row = $stmt->fetch()) {
                    echo '<tr><td>' . $row[0] . '</td><td> ' . $row[1] . '</td><td> ' . $row[2] . '</td></tr>';
                }
                echo '</table><br><br>';
                if ($stmt->rowCount() == 0) {
                    echo 'No TO-DOs to Display<br><br>';
                }
                echo '<a href="employee.php">Go Back</a>';
            } else {
                echo 'Error executing query: ';
            }
            ?>
        </main>
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
