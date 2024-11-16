<?php
include('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input
    $item_name = $con->real_escape_string($_POST['item_name']);
    $price = $con->real_escape_string($_POST['price']);

    // Update the SQL query to include 'price'
    $sql = "INSERT INTO add_item (item_name, price) VALUES ('$item_name', '$price')";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        // Redirect to item list page if successful
        header("Location: itemlist.php");
        exit(); 
    } else {
        // Display error message if the query fails
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>
