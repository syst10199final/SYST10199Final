<?php
session_start();
?>
<!--
Employee profile page.

@author Mohammad Shoeb
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Profile</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>
    <body>
        <nav>
            <a href="employee.php"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="../../Pages/todo.html">Add a TO-DO</a>
                <a href="viewToDo.php">View your TO-DO list</a>
                <a href="../../Pages/delete.html">Delete a TO-DO</a>
            </section>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <a href="logout.php">Log Out</a>
            </section>
        </nav>
        <main id="page-wrapper">
           <h2>
            <?php
            $employeeUsername = $_SESSION['username'];
            if ($employeeUsername == NULL) {
                echo "<script> location.href='login.php'; </script>";
            }
            echo 'Welcome, ' . $employeeUsername;
            ?>
            </h2>
            <ul>
                <li><a href="../../Pages/todo.html">Add a TO-DO</a></li>
                <li><a href="viewToDo.php">View your TO-DO list</a></li>
                <li><a href="../../Pages/delete.html">Delete a TO-DO</a></li>
                <!-- <li><a href="">Email Schedule</a></li>
                 This feature not demonstrable. -->
                <li><a href="help.html">Help</a></li>
            </ul>
        </main>
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>