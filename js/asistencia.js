const attendanceCheckboxes = document.querySelectorAll('.attendance-checkbox');
const submitButton = document.querySelector('.btn-primary');

attendanceCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            submitButton.disabled = false; // Enable submit button when a checkbox is checked
        } else {
            // Check if any checkboxes are still checked, if not, disable the submit button
            const checkedCheckboxes = attendanceCheckboxes.filter(checkbox => checkbox.checked);
            submitButton.disabled = checkedCheckboxes.length === 0;
        }
    });
});

submitButton.addEventListener('click', function() {
    // Submit the form using AJAX or Fetch API (not shown here)
    // Send the attendance data to attendance_handler.php
});