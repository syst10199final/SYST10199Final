<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

    </head>
    <body>
        <?php
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        if (isset($_POST['description'])) {

            $command = "insert into toDoList (Username, Description, Priority, Due_Date) values (?,?,?,?)"; //set up command"
            $stmt = $dbh->prepare($command); //prepare PDO statement ";
            $paramArray = array($_SESSION['username'], $_POST['description'], $_POST['priority'], $_POST['deadline']);
            $execOk = $stmt->execute($paramArray); //execute the statement  "
            if ($execOk) { //Check if error executing query   "
                echo "<script> location.href='acknowledgement.html'; </script>";
                exit;
            } else
                echo 'Error executing query: ';
        }
        ?>
    </body>
</html>
