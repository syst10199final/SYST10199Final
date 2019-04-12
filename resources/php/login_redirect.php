<?php
/*
 * Transition page processing login data and redirecting to appropriate landing.
 * 
 * @author Essa Tahir
 */
session_start();
require("connect.php");

try {
    $dbConn = new PDO("mysql:host=$hostname;dbname=martinaj_TrueBlu", $user, $passwd);
} catch (PDOException $e) {
    echo 'Connection error: ' . $e->getMessage();
}

// Employee login
if (isset($_POST['employee-username'])) {

    $employeeUsername = $_POST['employee-username'];
    $employeePassword = $_POST['employee-password'];

    $_SESSION['username'] = $employeeUsername;
    
    $loginErrorInvalid = "Invalid login. Please try again.";
    $loginErrorQueury = "Error accessing login server. Please try again later or contact your system administrator.";

    $command = "SELECT * FROM login WHERE Username = :employeeUsername AND Password = :employeePassword AND IsManager = 0";
    $stmt = $dbConn->prepare($command);
    $stmt->bindParam(":employeeUsername", $employeeUsername);
    $stmt->bindParam(":employeePassword", $employeePassword);
    $execOk = $stmt->execute();

    if ($execOk) {
        // If one and only one account is found as being registered, query is
        // successful, redirect user
        if ($stmt->rowCount() == 1) {
            header("Location: employee.php");
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    } else {
        header("Location: login.php");
        exit;
    }
}

// Manager login
if (isset($_POST['manager-username'])) {

    $managerUsername = $_POST['manager-username'];
    $managerPassword = $_POST['manager-password'];

    $_SESSION['username'] = $managerUsername;

    $command = "SELECT * FROM login WHERE username = :managerUsername AND password = :managerPassword AND IsManager = 1";
    $stmt = $dbConn->prepare($command);
    $stmt->bindParam(":managerUsername", $managerUsername);
    $stmt->bindParam(":managerPassword", $managerPassword);
    $execOk = $stmt->execute();

    if ($execOk) {
        if ($stmt->rowCount() == 1) {
            header("Location: manager.php");
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    } else {
        header("Location: login.php");
        exit;
    }
}