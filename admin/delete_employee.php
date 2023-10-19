<?php
if (isset($_GET['EmpCode'])) {
    $employee_id = $_GET['EmpCode'];

    // Perform database operations to delete the employee with the specified ID
    // You should also add appropriate error handling and security checks here

    // After successful deletion, you can redirect to the 'allemployees.php' page
    header('Location: allemployees.php');
    exit;
} else {
    // Handle cases where the 'employee_id' parameter is missing or invalid
    echo "Invalid request.";
    exit;
}
