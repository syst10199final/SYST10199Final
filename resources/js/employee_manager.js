/**
 * Script control for employee management system.
 * 
 * @author Jerome Martina
 */
window.addEventListener("load", function () {
    var actionSelect = document.querySelector("#employee-modify-action");
    var employeeModifySelect = document.querySelector("#employee-modify-select-container");
    var employeeModifyName = document.querySelector("#employee-modify-name");
    var employeeModifyEmail = document.querySelector("#employee-modify-email");
    var employeeModifyNameLabel = document.querySelector("#employee-modify-name-label");
    var employeeModifyEmailLabel = document.querySelector("#employee-modify-email-label");
    
    actionSelect.addEventListener("change", function () {
        if (actionSelect.selectedIndex === 0) {
            employeeModifySelect.style.display = "none";
            employeeModifyNameLabel.style.display = "inline-block";
            employeeModifyEmailLabel.style.display = "inline-block";
            employeeModifyName.type = "text";
            employeeModifyEmail.type = "email";
        } else if (actionSelect.selectedIndex === 1) {
            employeeModifySelect.style.display = "inline-block";
            employeeModifyNameLabel.style.display = "inline-block";
            employeeModifyEmailLabel.style.display = "inline-block";
            employeeModifyName.type = "text";
            employeeModifyEmail.type = "email";
        } else {
            employeeModifySelect.style.display = "inline-block";
            employeeModifyNameLabel.style.display = "none";
            employeeModifyEmailLabel.style.display = "none";
            employeeModifyName.type = "hidden";
            employeeModifyEmail.type = "hidden";
        }
    });
});