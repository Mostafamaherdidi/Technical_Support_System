<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'config.php'; // Include the database configuration file

    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'dashboard.php') !== false) {
        include_once 'd-navbar.php'; // Include dashboard navbar if coming from dashboard.php
    } else {
        include_once 'navbar.php'; // Include default navbar
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for the page */
        body {
            background-color: #000;
            color: #fff;
        }

        .container-fluid {
            padding: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        /* Custom fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Custom button style */
        .btn-primary {
            background-color: #000;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Custom text color for links */
        a {
            color: #007bff;
        }

        a:hover {
            color: #fff;
        }

        /* Custom alert style */
        .alert-info {
            background-color: #000;
            border-color: #007bff;
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <h1 class="mt-5 mb-4">Knowledge Base</h1>
        <div class="row">
            <?php
            include_once 'config.php';

            $sql = "SELECT DISTINCT category FROM knowledge_base";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category = $row["category"];
            ?>
                    <div class="col-md-3 mb-3">
                        <div class="card fade-in">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $category; ?></h5>

                                <!-- Payment button -->
                                <form action="purchase_category.php" method="post">
                                    <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </form>

                                <?php
                                $sql_entries = "SELECT id, title, content, photo_path FROM knowledge_base WHERE category = '$category'";
                                $result_entries = $conn->query($sql_entries);

                                if ($result_entries->num_rows > 0) {
                                    while ($entry_row = $result_entries->fetch_assoc()) {
                                ?>
                                            <div class="card mb-3">
                                                <img src="<?php echo $entry_row["photo_path"]; ?>" class="card-img-top" alt="Photo">
                                                <div class="card-body">
                                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $entry_row["title"]; ?></h6>
                                                    <p class="card-text"><?php echo $entry_row["content"]; ?></p>
                                                </div>
                                            </div>
                                <?php
                                    }
                                } else {
                                ?>
                                    <p class='text-muted'>No entries found for this category.</p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
            ?>
                <p class='alert alert-info'>No categories found.</p>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS (Required for modals) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
