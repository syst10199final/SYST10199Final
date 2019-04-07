<!--
Template for a listing on the roster of the Employee Manager page.

@author Jerome Martina
-->
<!DOCTYPE html>
<div class="employee-listing">
    <span class="employee-name"><?php echo $employeeName ?></span>
    <span class="employee-email"><?php echo $employeeEmail ?></span>
    <span class="button-container">
        <button class="employee-delete" type="button">Delete</button>
        <button class="employee-expand" type="button">Schedules</button>
    </span>
    <div class="employee-schedules">
        <?php echo $employeeSchedulesStr; ?>
        <!-- TODO Display relevant schedules -->
    </div>
</div>