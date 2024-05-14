<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["category"])) {
        $category = $_POST["category"];
        $sql = "SELECT id, title, content, photo_path FROM knowledge_base WHERE category = '$category'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Assuming you have a connection to the database already established
            include_once 'config.php';

            // Retrieve the category from the POST data
            $category = $_POST["category"];

            // Assuming you have a users table with a column named purchased_category_id to store the purchased category id
            // Update the users table to add the purchased category id
            $sql = "UPDATE users SET purchased_category_id = (SELECT id FROM categories WHERE name = '$category') WHERE id = 1"; // Adjust the WHERE clause as needed
            if ($conn->query($sql) === TRUE) {
                echo "Category purchased successfully.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "No entries found for this category.";
        }
    } else {
        echo "Category not specified.";
    }
} else {
    echo "Invalid request method.";
}
?>
