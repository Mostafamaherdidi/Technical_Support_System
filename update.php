<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the entry data from the database
    $sql = "SELECT * FROM knowledge_base WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Entry</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <style>
                .card {
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .btn-custom {
                    background-color: #007bff;
                    color: #fff;
                    transition: background-color 0.3s;
                }
                .btn-custom:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="container my-5">
                <?php
                if (isset($_GET['message'])) {
                    $messageType = $_GET['message'];
                    $messageText = '';

                    switch ($messageType) {
                        case 'success':
                            $messageText = 'Category update operation successful.';
                            $alertClass = 'alert-success';
                            // Redirect to dashboard after 2 seconds
                            echo '<script>setTimeout(function(){ window.location.href = "dashboard.php"; }, 2000);</script>';
                            break;
                        case 'error':
                            $messageText = 'An error occurred during the category update operation.';
                            $alertClass = 'alert-danger';
                            break;
                        default:
                            break;
                    }

                    echo '<div class="alert ' . $alertClass . ' d-flex align-items-center" role="alert">';
                    echo '<svg class="bi flex-shrink-0 me-2" role="img" aria-label="' . $messageType . ':"><use xlink:href="#check-circle-fill"/></svg>';
                    echo '<div>' . $messageText . '</div>';
                    echo '</div>';
                }
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Update Entry</h4>
                            </div>
                            <div class="card-body">
                                <form action="update_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row["title"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea class="form-control" id="content" name="content" rows="4" required><?php echo $row["content"]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $row["category"]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Upload New Photo:</label>
                                        <input type="file" class="form-control-file" id="photo" name="photo">
                                        <small class="form-text text-muted">Leave this field blank if you don't want to change the existing photo.</small>
                                    </div>
                                    <div class="form-group">
                                        <img src="uploads/<?php echo $row["photo_path"]; ?>" alt="Existing Photo" class="img-fluid">
                                    </div>
                                    <button type="submit" class="btn btn-custom">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS (Optional) -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Error: Entry not found.";
    }
} else {
    echo "Error: ID parameter is missing.";
}
?>
