<?php
session_start();
?>
<!DOCTYPE html>
<!--
Manager homepage.

@author Essa Tahir
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manager Menu</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>
    <body>
        <nav>
            <a href="manager.php"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="employee_manager.php">Manage Current Employees</a>
                <a href="CalendarMod.php">Create New Schedule</a>
                <a href="Calendar.php">Manage Current / Past Schedules</a>
            </section>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <div id="logged_in"><?php
                    $managerUsername = $_SESSION['username'];
                    if ($managerUsername == NULL) {
                        echo "<script> location.href='login.php'; </script>";
                    }
                    echo 'Welcome, ' . $managerUsername;
                    ?></div>
            </section>
            <a href="logout.php">Log Out</a>
        </nav>
        <main id="page-wrapper">
            <h2>Manager Menu</h2>
            <ul>
                <li><a href="employee_manager.php">Manage Current Employees</a></li>
                <li><a href="Calendar.php">Create New Schedule</a></li>
                <li><a href="CalendarMod.php">Manage Current / Past Schedules</a></li>
                <!-- <li><a href="">Email Schedule</a></li>
                 This feature not demonstrable. -->
                <li><a href="../../Pages/help.html">Help</a></li>
            </ul>
        </main>
        <footer> TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
