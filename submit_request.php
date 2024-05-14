<?php include "navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Support Request</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .container {
            margin-top: 50px;
        }

        .form-group label {
            color: #007bff;
        }

        .form-control {
            background-color: #1e1e1e;
            border-color: #007bff;
            color: #fff;
        }

        .form-control:focus {
            background-color: #1e1e1e;
            border-color: #007bff;
            color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            background-color: #1e1e1e;
            border-color: #007bff;
            color: #fff;
        }

        .alert-success {
            background-color: #155724;
            border-color: #155724;
        }

        .alert-danger {
            background-color: #721c24;
            border-color: #721c24;
        }

        .card {
            background-color: #1e1e1e;
            border-color: #007bff;
            color: #fff;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 20px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Submit Support Request</h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?php echo ($message == 'Support request submitted successfully.') ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="issue_description">Issue Description:</label>
                <textarea class="form-control" id="issue_description" name="issue_description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="system_details">System Details:</label>
                <textarea class="form-control" id="system_details" name="system_details" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="requested_service">Requested Service:</label>
                <input type="text" class="form-control" id="requested_service" name="requested_service" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
        include_once 'config.php'; // Include the database configuration file

        // Fetch existing services and display them in cards
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);
    ?>

<div class="container">
    <h2 class="mb-4"></h2>
   

<div class="container mt-5">
    <h2>services</h2>
    <div class="row">
        <?php
        // Fetch existing knowledge base entries and display them
        $sql = "SELECT * FROM knowledge_base";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6 col-lg-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['content'] . '</p>';
                echo '<p class="card-text">Category: ' . $row['category'] . '</p>';
                echo '<p class="card-text">Photo Path: ' . $row['photo_path'] . '</p>';
                echo '<div class="d-flex justify-content-between">';

              
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12"><div class="card"><div class="card-body">No knowledge base entries found.</div></div></div>';
        }
        ?>
    </div>
</div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
