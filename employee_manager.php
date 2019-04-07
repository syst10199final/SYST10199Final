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
        <script type="text/javascript" src="resources/js/employee_manager.js"></script>
    </head>
    <body>
        <?php
        // Initialize variables to use in UPDATE, if set by edit form
        $editEmployeeID = $_POST["employee-edit-select"];
        echo "Employee ID is " . $editEmployeeID;
        if (isset($_POST["employee-edit-name"]) && isset($_POST["employee-edit-email"])) {
            $editEmployeeName = $_POST["employee-edit-name"];
            $editEmployeeEmail = filter_input(INPUT_POST, "employee-edit-email", FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        }

        // Connect to database
        try {
            $dbConn = new PDO("mysql:host=$hostname;dbname=martinaj_TrueBlu", $user, $passwd);
        } catch (Exception $ex) {
            echo "Connection error: " . $e->getMessage() . "<br>";
            // TODO User-friendly logging of exceptions
        }

        // Prepare UPDATE statement to apply edits
        $updateSql = "UPDATE user_accounts SET Name = '" . $editEmployeeName . "', Email = '" . $editEmployeeEmail . "' WHERE ID = " . $editEmployeeID;
        $updateStatement = $dbConn->prepare($updateSql);
        $updateExecOk = $updateStatement->execute();

        if ($updateExecOk) {
            
        } else {
            echo "Error executing query: " . $dbConn->errorInfo()[2];
            // TODO User-friendly logging of exceptions
        }
        
        // Prepare DELETE statement if delete was passed

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
            <h2>Employee Manager</h2>
            <section id="employee-list">
                <?php
                for ($i = 0; $i < sizeof($employeeNames); $i++) {
                    $employeeName = $employeeNames[$i];
                    $employeeEmail = $employeeEmails[$i];
                    include("employee_listing.php");
                }
                ?>
            </section>
            <div class="employee-edit-form-container">
                <form class="employee-edit-form" method="POST" action="employee_manager.php">
                    <label>Employee to Edit:</label>
                    <select name=employee-edit-select>
                        <?php
                        for ($i = 0; $i < sizeof($employeeNames); $i++) {
                            echo "<option value=" . $employeeIDs[$i] . ">" . $employeeIDs[$i] . " - " . $employeeNames[$i] . "</option>";
                        }
                        ?>
                    </select>
                    <label>Name</label>
                    <input type="text" name="employee-edit-name" required>
                    <label>E-mail Address</label>
                    <input type="email" name="employee-edit-email" required>
                    <input type="submit" name="employee-edit-submit" value="Save">
                </form>
            </div>
        </main>
    </body>
</html>
