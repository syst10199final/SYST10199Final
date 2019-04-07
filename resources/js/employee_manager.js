/**
 * Script control for TrueBlu's employee management system.
 * 
 * @author Jerome Martina
 */
window.addEventListener("load", function () {
    var scheduleLists = document.querySelectorAll(".employee-schedules");
    var editForms = document.querySelectorAll(".employee-edit-form-container");

    var expandButtons = document.querySelectorAll(".employee-expand");
    expandButtons.forEach(function (button, index) {
        button.addEventListener("click", function () {
            if (scheduleLists[index].style.display === "none") {
                scheduleLists[index].style.display = "block";
            } else {
                scheduleLists[index].style.display = "none";
            }
        });
    });
    
    var deleteButtons = document.querySelectorAll(".employee-delete");
    deleteButtons.forEach(function (button, index) {
       button.addEventListener("click", function() {
           var del = confirm("Are you sure you want to delete this employee?");
           if (del === true) {
               location.reload();
               // TODO delete functionality
           } else {}
       });
    });
});