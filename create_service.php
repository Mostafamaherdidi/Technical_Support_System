<?php
include 'd-navbar.php';
include_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $photo_path = $_POST['photo_path'];

    // Create a new knowledge base entry
    $sql = "INSERT INTO knowledge_base (title, content, category, photo_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $content, $category_id, $photo_path);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success mt-3" role="alert">Knowledge base entry created successfully!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}
?>

<div class="container">
    <h2 class="mb-4">Create New Knowledge Base Entry</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <div class="invalid-feedback">Please enter a title.</div>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
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
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback">Please select a category.</div>
        </div>
        <div class="form-group">
            <label for="photo_path">Photo Path:</label>
            <input type="text" class="form-control" id="photo_path" name="photo_path">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<div class="container mt-5">
    <h2>Knowledge Base</h2>
    <div class="row">
        <?php
        // Fetch existing knowledge base entries and display them
        $sql = "SELECT * FROM knowledge_base";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6 col-lg-4 mb-4" >';
                echo '<div class="card btn btn-light">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['content'] . '</p>';
                echo '<p class="card-text">Category: ' . $row['category'] . '</p>';
                echo '<p class="card-text">Photo Path: ' . $row['photo_path'] . '</p>';
                echo '<div class="d-flex justify-content-between">';
                echo '<a href="update_service.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>';
                echo '<a href="delete_service.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
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

<!-- Existing code for form validation -->