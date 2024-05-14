<?php
include_once 'config.php';

// Check if ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: create_service.php");
    exit();
}

// Retrieve knowledge base entry details from the database
$id = $_GET['id'];
$sql = "SELECT * FROM knowledge_base WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No knowledge base entry found with the given ID.";
    exit();
}

$entry = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $photo_path = $_POST['photo_path'];

    // Update knowledge base entry in the database
    $sql = "UPDATE knowledge_base SET title=?, content=?, category=?, photo_path=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $content, $category_id, $photo_path, $id);
    if ($stmt->execute()) {
        // Set a session variable to show the success message
        $_SESSION['knowledge_base_updated'] = true;
        header("Refresh: 2; URL=create_service.php");
    } else {
        echo 'Failed to update knowledge base entry.';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Knowledge Base Entry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
        }

        .container {
            margin-top: 50px;
        }

        .form-group label {
            color: #fff;
        }

        .form-control {
            background-color: #333;
            border: 1px solid #666;
            color: #fff;
        }

        .form-control:focus {
            background-color: #333;
            border-color: #666;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card {
            border-radius: 10px;
            background-color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            color: #fff;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Knowledge Base Entry</h2>
        <?php if (isset($_SESSION['knowledge_base_updated'])): ?>
            <div class="alert alert-success" role="alert">
                Knowledge base entry updated successfully!
            </div>
        <?php unset($_SESSION['knowledge_base_updated']); endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($entry['title']) ? $entry['title'] : ''; ?>" required>
                <div class="invalid-feedback">Please enter a title.</div>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="3" required><?php echo isset($entry['content']) ? $entry['content'] : ''; ?></textarea>
                <div class="invalid-feedback">Please enter the content.</div>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $selected = isset($entry['category']) && $entry['category'] == $row['name'] ? 'selected' : '';
                            echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <div class="invalid-feedback">Please select a category.</div>
            </div>
            <div class="form-group">
                <label for="photo
                <label for="photo_path">Photo Path:</label>
                <input type="text" class="form-control" id="photo_path" name="photo_path" value="<?php echo isset($entry['photo_path']) ? $entry['photo_path'] : ''; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Form validation -->
    <script>
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    </script>
</body>
</html>
