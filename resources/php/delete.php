<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("connect.php");
$value = $_POST['condition'];
$usr = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TO-DO Deleted</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="resources/css/master.css">
    </head>
    <body>
        <nav>
            <img id="logo" src="resources/images/Logo.svg" alt="logo" draggable="false">	
        </nav>
        <br><br><br><br><br>

        <?php
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
        if ($_POST['deleteby'] == 'description') {
            $command = "DELETE FROM toDoList WHERE Description = $value and Username = '$usr' "; //set up command"
        }
        if ($_POST['deleteby'] == 'priority') {
            $command = "DELETE FROM toDoList WHERE Priority = '$value' and Username = '$usr'"; //set up command"
        }
        if ($_POST['deleteby'] == 'due_date') {
            $command = "DELETE FROM toDoList WHERE Due_Date = $value and Username = '$usr'"; //set up command"
        }
        if ($_POST['deleteby'] == 'referee_count') {
            $command = "DELETE FROM toDoList WHERE referee_count = $value and username = '$usr'"; //set up command"
        }

        $stmt = $dbh->prepare($command); //prepare PDO statement ";
        // $params = array($_POST['deleteby'], $_POST['condition']);
        $execOk = $stmt->execute(); //execute the statement  "

        if ($stmt->rowCount() > 0) { //Check if error executing query   "
            echo '<h2>TO-DO Deleted Successfully.<br></h2>';
        } else
            echo 'No Records deleted';
        unset($_POST['deleteby']);
        ?>
        <br><br><br>
        <button  id="a"><a id="a" href="employee.php">Go Back</a></button>
    </body> 
</html>
