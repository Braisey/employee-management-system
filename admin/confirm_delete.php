<?php
if (isset($_GET['EmpCode'])) {
    $employee_id = $_GET['EmpCode'];
} else {
    // Handle cases where the 'employee_id' query parameter is missing or invalid
    echo "Invalid request.";
    exit;
}
?>

<h1>Confirm Deletion</h1>
<p>Are you sure you want to delete this employee?</p>

<form method="GET" action="delete_employee.php">
    <input type="hidden" name="EmpCode" value="<?php echo $EmpCode; ?>">
    <button type="submit" name="confirm_delete">Yes, Delete</button>
</form>

<a href="allemployees.php">No, Cancel</a>
