<?php
session_start();
// Temp day value
$day = 32;
// Nested array containing 31 arrays holding schedules for each day of the month
$schedule = array(
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array(), array(), array(), array(), array(),
    array(), array(), array()
);
// Take inputs from html form
if ($_POST) {
    if (isset($_POST['dn'])) {
        $dn = (int) $_POST['dn'];
        $day = $dn - 1;
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['start'])) {
        $start = $_POST['start'];
    }
    if (isset($_POST['end'])) {
        $end = $_POST['end'];
    }
    $tmp = strval($name) . " | " . strval($start) . " - " . strval($end);
    $schedule[$day][0] = $tmp;
}
?>
<!DOCTYPE html>
<!--
Page handling calendar modification.

@author Willem Wantenaar
-->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <link type="text/css" rel="stylesheet" href="../css/Calendar.css"/>
        <link type="text/css" rel="stylesheet" href="../css/master.css"/>
        <script type="text/javascript" src="resources/js/Calendar.js"></script>
    </head>
    <body>
        <nav> 
            <img id="logo" src="../images/Logo.svg" alt="logo" draggable="false">
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="employee_manager.php">Manage Current Employees</a>
                <a href="Calendar.php">Manage Current / Past Schedules</a>
            </section>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <a href="../../index.html">Log Out</a>
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
                            <form class="calendar-mod-form" method="POST" action="CalendarMod.php">
                                Select Date: <input type="number" name="dn" max="31" min="1" value="1">
                                <input type="submit">
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
            <br>
            <div id="dataEntry" align="center">
                <form class="calendar-mod-form" method="POST" action="CalendarMod.php">
                    <p>Select Date: <input type="number" name="dn" max="31" min="1" value="1">
                        Name: <input type="text" name="name" id="name">
                    <p>Start Time: <input type="time" name="start" id="start">
                        End Time: <input type="time" name="end" id="end"></p>
                    <input type="submit">
                </form>
            </div>
        </main>
        <footer> TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
