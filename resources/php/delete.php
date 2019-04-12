<?php
session_start();
require("connect.php");
$value = $_POST['condition'];
$usr = $_SESSION['username'];
?>
<!DOCTYPE html>
<!--
Page handling deletion of TO-DOs.

@author Mohammad Shoeb
-->
<html>
    <head>
        <title>TO-DO Deleted</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>
    <body>
        <nav>
            <img id="logo" src="../images/Logo.svg" alt="logo" draggable="false">
            <a href="../../index.html">Log Out</a>
        </nav>
        <main id="page-wrapper">
            <?php
            try {
                $dbConn = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
            } catch (PDOException $e) {
                echo 'Connection error: ' . $e->getMessage();
            }
            if ($_POST['deleteby'] == 'description') {
                $command = "DELETE FROM toDoList WHERE Description = :value and Username = :usr";
            }
            if ($_POST['deleteby'] == 'priority') {
                $command = "DELETE FROM toDoList WHERE Priority = :value and Username = :usr";
            }
            if ($_POST['deleteby'] == 'due_date') {
                $command = "DELETE FROM toDoList WHERE Due_Date = :value and Username = :usr";
            }
            if ($_POST['deleteby'] == 'referee_count') {
                $command = "DELETE FROM toDoList WHERE referee_count = :value and username = :usr";
            }

            $stmt = $dbConn->prepare($command);
            $stmt->bindParam(":value", $value);
            $stmt->bindParam(":usr", $usr);
            // $params = array($_POST['deleteby'], $_POST['condition']);
            $execOk = $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<h2>TO-DO Deleted Successfully.<br></h2>';
            } else {
                echo 'No records deleted.';
            }
            unset($_POST['deleteby']);
            ?>
            <a href="employee.php">Go Back</a>
        </main>
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
