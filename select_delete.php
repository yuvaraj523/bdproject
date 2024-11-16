<?php
include('db.php');

// Check if the delete button is clicked and selected records are provided
if (isset($_POST['delete_selected']) && isset($_POST['selected_records'])) {
    $selected_ids = $_POST['selected_records']; // Get selected records
    
    // Loop through selected IDs and perform deletion
    foreach ($selected_ids as $id) {
        // Sanitize the ID
        $id = intval($id);

        // Delete from Admin2 and Admin tables
        $sqlDeleteAdmin2 = "DELETE FROM Admin2 WHERE quotation_id = $id";
        $sqlDeleteAdmin = "DELETE FROM Admin WHERE id = $id";

        // Execute delete queries
        $con->query($sqlDeleteAdmin2);
        $con->query($sqlDeleteAdmin);
    }

    // Redirect to the same page with a success message
    header("Location: display.php?delete_success=true");
    exit();
}

$con->close();
?>
