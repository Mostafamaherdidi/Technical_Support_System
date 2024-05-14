<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #444;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }
        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #666;
            border-radius: 5px;
            background-color: #555;
            color: #fff;
        }
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            form {
                max-width: 90%;
            }
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .service-card {
            background-color: #444;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <?php
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="service-card">
                    <h3><?php echo $row["title"]; ?></h3>
                    <p><?php echo $row["content"]; ?></p>
                    <p><strong>Category ID:</strong> <?php echo $row["category_id"]; ?></p>
                    <p><strong>Photo Path:</strong> <?php echo $row["photo_path"]; ?></p>
                    <div>
                        <a href="update.php?id=<?php echo $row["id"]; ?>" style="margin-right: 10px;">Update</a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No entries found.</p>";
        }
        ?>
    </div>
</body>
</html>
