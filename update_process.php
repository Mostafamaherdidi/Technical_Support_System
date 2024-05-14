<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Fetch the existing photo path from the database
    $sql = "SELECT photo_path FROM knowledge_base WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $existing_photo_path = $row["photo_path"];

    // Check if a new file was uploaded
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        // Directory where uploaded files will be stored
        $target_dir = "";

        // Generate a unique filename
        $file_name = uniqid() . '_' . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is an image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        $allowed_formats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_formats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // If everything is ok, try to upload the new file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Delete the existing photo from the uploads directory
                $file_path = "uploads/" . $existing_photo_path;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }

                // Update the entry in the database with the new photo path
                $sql = "UPDATE knowledge_base SET title = ?, content = ?, category = ?, photo_path = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$title, $content, $category, $target_file, $id]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update the entry in the database without changing the photo
        $sql = "UPDATE knowledge_base SET title = ?, content = ?, category = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $content, $category, $id]);
    }

    header("Location: dashboard.php");
    exit();
}
?>