<?php
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_items'])) {
    // Get the selected item IDs
    $selected_items = $_POST['selected_items'];

    // Prepare the SQL statement for deletion
    $ids = implode(',', array_map('intval', $selected_items)); // Sanitize input
    $delete_sql = "DELETE FROM add_item WHERE id IN ($ids)";

    // Execute the delete query
    if ($con->query($delete_sql) === TRUE) {
        // Redirect back with a success message
        header("Location: itemlist.php?message=delete_success");
        exit();
    } else {
        // Handle error
        echo "Error: " . htmlspecialchars($con->error);
    }
}

$con->close();
?>