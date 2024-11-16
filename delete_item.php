<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $deleteSql = "DELETE FROM Admin2 WHERE id = $id";
        if ($con->query($deleteSql) === TRUE) {
            echo "Item deleted successfully";
        } else {
            echo "Error deleting item: " . $con->error;
        }
    } else {
        echo "Invalid item ID.";
    }
}
?>