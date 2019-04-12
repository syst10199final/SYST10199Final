<!--
Page handling employee management.

@author Jerome Martina
-->
<?php
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Employees</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
        <link rel="stylesheet" type="text/css" href="../css/employees.css">
        <script type="text/javascript" src="../js/employee_manager.js"></script>
    </head>
    <body>
        <?php
        // Initialize variables to use in modification.
        $modifyEmployeeAction = $_POST["employee-modify-action"];
        $modifyEmployeeID = $_POST["employee-modify-select"];
        $nameRegexp = array("options"=>array("regexp"=>"/[\w]+/"));
        if (isset($_POST["employee-modify-name"]) && isset($_POST["employee-modify-email"])) {
            $modifyEmployeeName = filter_input(INPUT_POST, "employee-modify-name", FILTER_VALIDATE_REGEXP, $nameRegexp);
            $modifyEmployeeEmail = filter_input(INPUT_POST, "employee-modify-email", FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        }

        // Connect to database.
        try {
            $dbConn = new PDO("mysql:host=$hostname;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (Exception $ex) {
            echo "Connection error: " . $e->getMessage();
            // No more graceful methods of logging PHP exceptions are within the 
            // scope of the class than echoing error messages out of user sight.
        }

        switch ($modifyEmployeeAction) {
            case "add":
                $addSql = "INSERT INTO employees (Name, Email) VALUES (:modifyEmployeeName, :modifyEmployeeEmail)";
                $addStatement = $dbConn->prepare($addSql);
                $addStatement->bindParam(":modifyEmployeeName", $modifyEmployeeName);
                $addStatement->bindParam(":modifyEmployeeEmail", $modifyEmployeeEmail);
                $addExecOk = $addStatement->execute();
                if ($addExecOk) {
                    echo "Successful add query.";
                } else {
                    echo "Error executing INSERT query: " . $dbConn->errorInfo()[2];
                }
                break;
            case "edit":
                $updateSql = "UPDATE employees SET Name = :modifyEmployeeName, Email = :modifyEmployeeEmail WHERE ID = :modifyEmployeeID";
                $updateStatement = $dbConn->prepare($updateSql);
                $updateStatement->bindParam(":modifyEmployeeName", $modifyEmployeeName);
                $updateStatement->bindParam(":modifyEmployeeEmail", $modifyEmployeeEmail);
                $updateStatement->bindParam(":modifyEmployeeID", $modifyEmployeeID);
                $updateExecOk = $updateStatement->execute();
                if ($updateExecOk) {
                    
                } else {
                    echo "Error executing UPDATE query: " . $dbConn->errorInfo()[2];
                }
                break;
            case "delete":
                $deleteSql = "DELETE FROM employees WHERE ID = :modifyEmployeeID";
                $deleteStatement = $dbConn->prepare($deleteSql);
                $deleteStatement->bindParam(":modifyEmployeeID", $modifyEmployeeID);
                $deleteExecOk = $deleteStatement->execute();
                if ($deleteExecOk) {
                    
                } else {
                    echo "Error executing DELETE query: " . $dbConn->errorInfo()[2];
                }
                break;
            default:
                echo "Unexpected error: no mod action found. Defaulting...";
                break;
        }

        // Prepare SELECT statement
        $selectSql = "SELECT ID, Name, Email FROM employees";
        $selectStatement = $dbConn->prepare($selectSql);
        $selectExecOk = $selectStatement->execute();

        if ($selectExecOk) {
            $employeeIDs = array();
            $employeeNames = array();
            $employeeEmails = array();
            while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
                array_push($employeeIDs, $row['ID']);
                array_push($employeeNames, $row['Name']);
                array_push($employeeEmails, $row['Email']);
            }
        } else {
            echo "Error executing query: " . $dbConn->errorInfo()[2];
        }
        ?>
        <nav>
            <section id="buttons">
                <h2 class="hidden-heading">Nav Button Container</h2>
                <a href="CalendarMod.php">Create New Schedule</a>
                <a href="Calendar.php">Manage Current / Past Schedules</a>
            </section>
            <a href="../../index.html"><img id="logo" src="../images/Logo.svg" alt="logo" draggable="false"></a>
            <section id="login">
                <h2 class="hidden-heading">Logout Button Container</h2>
                <a href="logout.php">Log Out</a>
            </section>
        </nav>
        <main id="page-wrapper">
            <section id="employee-list">
                <h2 class="hidden-heading">Employee List</h2>
                <!--
                Template for a listing on the roster of the Employee Manager page.

                @author Jerome Martina
                -->
                <?php
                for ($i = 0; $i < sizeof($employeeNames); $i++) {
                    $employeeName = $employeeNames[$i];
                    $employeeEmail = $employeeEmails[$i];
                    include("employee_listing.php");
                }
                ?>
            </section>
            <div class="employee-modify-form-container">
                <form method="POST" action="employee_manager.php">
                    <label>Action:</label>
                    <select id="employee-modify-action" name="employee-modify-action">
                        <option value="add">Add New</option>
                        <option value="edit">Edit</option>
                        <option value="delete">Delete</option>
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
        <footer>TrueBlu 2019 &#169; Essa Tahir, Gregory Knott, Jerome Martina, Mohammad Shoeb, Willem Wantenaar</footer>
    </body>
</html>
