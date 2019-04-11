<?
    // temp day value
    $day = 32;
    // nested array containing 31 arrays holding schedules for each day of the month
    $schedule = array(
        array(), array(), array(), array(), array(), array(), array(),
        array(), array(), array(), array(), array(), array(), array(),
        array(), array(), array(), array(), array(), array(), array(),
        array(), array(), array(), array(), array(), array(), array(),
        array(), array(), array()
    );
    // take inputs from html form
    if($_POST){
        if(isset($_POST['dn'])){
            $dn = (int)$_POST['dn'];
            $day = $dn-1;
        };
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        };
        if(isset($_POST['start'])){
            $start = $_POST['start'];
        };
        if(isset($_POST['end'])){
            $end = $_POST['end'];
        };
        $tmp = strval($name) . " | " . strval($start) . " - " . strval($end);
        $schedule[$day][0] = $tmp;
    };


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <link type="text/css" rel="stylesheet" href="css/Calendar.css"/>
        <script type="text/javascript" src="Calendar.js"></script>
    </head>
    <body>
        <nav>
            <img id="logo" src="images/Logo.svg" alt="logo" draggable="false">
<!-- 	The nav buttons do not need to be here as the user would need to log in first anyways -->
            <section id = "login">
                <a>Log in</a>
            </section>
        </nav>
<!-- 	Calendar -->
        <section class="page-wrapper">
            <table><tr><td>
            <div id="container">
                <div id="header">
                    <span id="month"></span>
                </div>
                <div id="dates"></div>
            </div>
            </td><td>
            <div id="schedule" align="right">
                <h1><em>Schedule Name</em></h1>
                <form method="POST" action="CalendarMod.php">
                    <font size="+1">Select Date: <input type="number" name="dn" id="day-number" max="31" min="1" value="1"></input></font>
                    <input type="submit" />
                </form>
                <br>
                <ul id="events">
                    <li id="lb1"><p><?= ($schedule[$dn-1][0])?></p></li>
                    <li id="lb2"><?= ($schedule[$dn-1][1])?></li>
                    <li id="lb1"><?= ($schedule[$dn-1][2])?></li>
                    <li id="lb2"><?= ($schedule[$dn-1][3])?></li>
                    <li id="lb1"><?= ($schedule[$dn-1][4])?></li>
                </ul>
            </td></tr></table>
            </div>
            <br>
            <div id="dataEntry" align="center">
                <form method="POST" action="CalendarMod.php">
                    <p><font size="+1">Select Date: <input type="number" name="dn" id="day-number" max="31" min="1" value="1"></input></font>
                    <font size="+1">Name: <input type="text" name="name" id="name"></input></font></p>
                    <p><font size="+1">Start Time: <input type="time" name="start" id="start"></input></font>
                    <font size="+1">End Time: <input type="time" name="end" id="end"></input></font></p>
                    <input type="submit" />
                </form>
            </div>
        </section>
    <footer> TrueBlu 2019 &#169 Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
