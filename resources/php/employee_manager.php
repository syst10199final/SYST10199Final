<!--
Page handling employee management.

@author Jerome Martina
-->
<?php
require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Employees</title>
        <link rel="stylesheet" type="text/css" href="resources/css/master.css">
        <link rel="stylesheet" type="text/css" href="resources/css/employees.css">
        <script type="text/javascript" src="resources/js/employee_manager.js"></script>
    </head>
    <body>
        <?php
        // Initialize variables to use in modification
        $modifyEmployeeAction = $_POST["employee-modify-action"];
        $modifyEmployeeID = $_POST["employee-modify-select"];
        if (isset($_POST["employee-modify-name"]) && isset($_POST["employee-modify-email"])) {
            $modifyEmployeeName = $_POST["employee-modify-name"];
            $modifyEmployeeEmail = filter_input(INPUT_POST, "employee-modify-email", FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        }

        // Connect to database
        try {
            $dbConn = new PDO("mysql:host=$hostname;dbname=martinaj_TrueBlu", $user, $passwd);
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connection error: " . $e->getMessage() . "<br>";
            // TODO User-friendly logging of exceptions
        }

        switch ($modifyEmployeeAction) {
            case "add":
                $addSql = "INSERT INTO user_accounts (Name, Email) VALUES (:modifyEmployeeName, :modifyEmployeeEmail)";
                echo $addSql;
                $addStatement = $dbConn->prepare($addSql);
                $addStatement->bindParam(":modifyEmployeeName", $modifyEmployeeName);
                $addStatement->bindParam(":modifyEmployeeEmail", $modifyEmployeeEmail);
                $addExecOk = $addStatement->execute();
                if ($addExecOk) {
                    echo "Successful add query.";
                } else {
                    echo "Error executing INSERT query: " . $dbConn->errorInfo()[2];
                    // TODO Graceful logging of exceptions
                }
                break;
            case "edit":
                $updateSql = "UPDATE user_accounts SET Name = :modifyEmployeeName, Email = :modifyEmployeeEmail WHERE ID = :modifyEmployeeID";
                echo $updateSql;
                $updateStatement = $dbConn->prepare($updateSql);
                $updateStatement->bindParam(":modifyEmployeeName", $modifyEmployeeName);
                $updateStatement->bindParam(":modifyEmployeeEmail", $modifyEmployeeEmail);
                $updateStatement->bindParam(":modifyEmployeeID", $modifyEmployeeID);
                $updateExecOk = $updateStatement->execute();
                if ($updateExecOk) {
                    
                } else {
                    echo "Error executing UPDATE query: " . $dbConn->errorInfo()[2];
                    // TODO Graceful logging of exceptions
                }
                break;
            case "delete":
                $deleteSql = "DELETE FROM user_accounts WHERE ID = :modifyEmployeeID";
                $deleteStatement = $dbConn->prepare($deleteSql);
                $deleteStatement->bindParam(":modifyEmployeeID", $modifyEmployeeID);
                $deleteExecOk = $deleteStatement->execute();
                if ($deleteExecOk) {
                    
                } else {
                    echo "Error executing DELETE query: " . $dbConn->errorInfo()[2];
                    // TODO Graceful logging of exceptions
                }
                break;
            default:
                echo "Unexpected error: no mod action found. Defaulting...";
                break;
        }

        // Prepare SELECT statement
        $selectSql = "SELECT ID, Name, Email, Schedules, Manager FROM user_accounts";
        $selectStatement = $dbConn->prepare($selectSql);
        $selectExecOk = $selectStatement->execute();

        if ($selectExecOk) {
            $employeeIDs = array();
            $employeeNames = array();
            $employeeEmails = array();
            $employeeSchedulesArr = array();
            while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
                array_push($employeeIDs, $row['ID']);
                array_push($employeeNames, $row['Name']);
                array_push($employeeEmails, $row['Email']);
                $employeeSchedulesStr = $row['Schedules'];
                array_push($employeeSchedulesArr, $employeeSchedules);
                $employeeSchedules = explode(",", $employeeSchedulesStr);
            }
        } else {
            echo "Error executing query: " . $dbConn->errorInfo()[2];
            // TODO User-friendly logging of exceptions
        }
        ?>
        <nav>
            <img id="logo" src="resources/images/logo.svg" alt="logo" draggable="false">
            <section id="buttons">
                <a href="">Manage Schedules</a>
            </section>
            <section id="login">
                <a>Log in</a>
            </section>
        </nav>
        <main class="page-wrapper">
            <section id="employee-list">
                <?php
                for ($i = 0; $i < sizeof($employeeNames); $i++) {
                    $employeeName = $employeeNames[$i];
                    $employeeEmail = $employeeEmails[$i];
                    include("employee_listing.php");
                }
                ?>
            </section>
            <div class="employee-modify-form-container">
                <form class="employee-modify-form" method="POST" action="employee_manager.php">
                    <label>Action:</label>
                    <select id="employee-modify-action" name="employee-modify-action">
                        <option name="employee-modify-action" value="add">Add New</option>
                        <option name="employee-modify-action" value="edit">Edit</option>
                        <option name="employee-modify-action" value="delete">Delete</option>
                    </select>
                    <span id="employee-modify-select-container">
                        <label>Employee to Edit:</label>
                        <select id="employee-modify-select" name=employee-modify-select>
                            <?php
                            for ($i = 0; $i < sizeof($employeeNames); $i++) {
                                echo "<option value=" . $employeeIDs[$i] . ">" . $employeeIDs[$i] . " - " . $employeeNames[$i] . "</option>";
                            }
                            ?>
                        </select>
                    </span>
                    <span>
                        <label id="employee-modify-name-label">Name</label>
                        <input id="employee-modify-name" type="text" name="employee-modify-name" required>
                    </span>
                    <span >
                        <label id="employee-modify-email-label">E-mail Address</label>
                        <input id="employee-modify-email" type="email" name="employee-modify-email" required> 
                    </span>
                    <input type="submit" name="employee-modify-submit" value="Save">
                </form>
            </div>
        </main>
    </body>
</html>
