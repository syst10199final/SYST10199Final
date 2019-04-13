<?php
session_start();
if ($_POST) {
    if (isset($_POST['dn'])) {
        $dn = (int) $_POST['dn'];
    }
}
// Nested array containing 31 arrays holding schedules for each day of the month
$schedule = array(
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array()
);
?>

<!DOCTYPE html>
<!--
Page displaying calendar, schedules.

@author Willem Wantenaar
-->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <link type="text/css" rel="stylesheet" href="../css/Calendar.css"/>
        <link type="text/css" rel="stylesheet" href="../css/master.css"/>
        <script type="text/javascript" src="../js/Calendar.js"></script>
    </head>
    <body>
        <nav>
            <a href="manager.php"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="employee_manager.php">Manage Current Employees</a>
                <a href="CalendarMod.php">Create New Schedule</a>
            </section>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <a href="logout.php">Log Out</a>
            </section>
        </nav>
        <!-- Calendar -->
        <main id="page-wrapper">
            <table>
                <tr>
                    <td>
                        <div id="container">
                            <div id="header">
                                <span id="month"></span>
                            </div>
                            <div id="dates"></div>
                        </div>
                    </td>
                    <td>
                        <div id="schedule" align="right">
                            <h1><em>Schedule Name</em></h1>
                            <form method="POST" action="Calendar.php">
                                Select Date: <input type="number" name="dn" id="day-number" max="31" min="1" value="1">
                                <input type="submit"/>
                            </form>
                            <br>
                            <ul id="events">
                                <li class="lb1"><p><?= ($schedule[$dn - 1][0]) ?></p></li>
                                <li class="lb2"><?= ($schedule[$dn - 1][1]) ?></li>
                                <li class="lb1"><?= ($schedule[$dn - 1][2]) ?></li>
                                <li class="lb2"><?= ($schedule[$dn - 1][3]) ?></li>
                                <li class="lb1"><?= ($schedule[$dn - 1][4]) ?></li>
                            </ul>
                    </td>
                </tr>
            </table>
        </main>
        <footer> TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
