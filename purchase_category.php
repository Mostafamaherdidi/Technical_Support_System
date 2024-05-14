<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php

include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["category"])) {
        $category = $_POST["category"];

        // Assuming you have a connection to the database already established
        include_once 'config.php';

        // Retrieve the id of the category from the knowledge_base table
        $sql_get_category_id = "SELECT id FROM knowledge_base WHERE category = '$category'";
        $result_category_id = $conn->query($sql_get_category_id);

        if ($result_category_id->num_rows > 0) {
            $row = $result_category_id->fetch_assoc();
            $category_id = $row['id'];

            // Insert payment information into the payments table
            $user_id = 1; // Assuming a user with ID 1 is making the purchase
            $amount = 10.00; // Assuming the amount of the purchase
            $payment_date = date("Y-m-d"); // Current date
            $payment_method = "Credit Card"; // Assuming the payment method
            $status = "completed"; // Assuming the payment is completed

            $sql_insert_payment = "INSERT INTO payments (user_id, amount, payment_date, payment_method, status, knowledge_base_category_id) 
                                   VALUES ($user_id, $amount, '$payment_date', '$payment_method', '$status', $category_id)";

            if ($conn->query($sql_insert_payment) === TRUE) {
                // Payment successful message with Bootstrap alert
                echo '<div class="alert alert-success" role="alert">Category purchased successfully. Payment successful!</div>';
                // JavaScript redirection to knowledge_base.php after 2 seconds
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "knowledge_base.php";
                        }, 2000);
                      </script>';
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Category ID not found.";
        }
    } else {
        echo "Category not specified.";
    }
} else {
    echo "Invalid request method.";
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>