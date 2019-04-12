<?php
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<!--
Page allowing for the addition of TO-DOs to the database.

@author Mohammad Shoeb
-->
<html>
    <head>
        <title>Add new TO-DO</title>
    </head>
    <body>
        <?php
        try {
            $dbConn = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        if (isset($_POST['description'])) {
            $command = "INSERT INTO toDoList (Username, Description, Priority, Due_Date) VALUES (?,?,?,?)"; // set up command"
            $stmt = $dbConn->prepare($command); //prepare PDO statement ";
            $paramArray = array($_SESSION['username'], $_POST['description'], $_POST['priority'], $_POST['deadline']);
            $execOk = $stmt->execute($paramArray); //execute the statement  "
            if ($execOk) { //Check if error executing query   "
                echo "<script> location.href='../../Pages/acknowledgement.html'; </script>";
                exit;
            } else {
                echo 'Error executing query: ';
            }
        }
        ?>
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
