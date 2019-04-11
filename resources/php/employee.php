<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome to your page</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>
    <body>
        <nav>
            <a href="../../index.html"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
            <section id = "buttons">
                <!--				<a href="">View Schedule</a>-->
                <a href="todo.html">Add a TO-DO</a>
                <a href="viewToDo.php">View your TO-DO list</a>
                <a href="delete.html">Delete a To-DO</a>
            </section>
        </nav>
        <br><br><br>
        <h2>
            <?php
            $employeeUsername = $_SESSION['username'];
            if ($employeeUsername == NULL) {
                echo "<script> location.href='login.php'; </script>";
            }
            echo 'Welcome ' . $employeeUsername;
            ?>
        </h2>
    </body>
</html>