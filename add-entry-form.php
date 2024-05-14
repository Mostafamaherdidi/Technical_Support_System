<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Entry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <style>
        body {
            background-color: #343a40; /* Dark gray */
            color: #f8f9fa; /* Light gray */
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: #495057; /* Dark blue-gray */
            border: 1px solid #495057; /* Dark blue-gray */
            color: #f8f9fa; /* Light gray */
        }
        .card-header {
            background-color: #007bff; /* Primary blue */
            border-bottom: 1px solid #007bff; /* Primary blue */
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control {
            background-color: #343a40; /* Dark gray */
            color: #f8f9fa; /* Light gray */
            border: 1px solid #6c757d; /* Medium gray */
        }
        .form-control:focus {
            background-color: #495057; /* Dark blue-gray */
            border-color: #007bff; /* Primary blue */
        }
        .form-control::placeholder {
            color: #6c757d; /* Medium gray */
        }
        .btn-primary {
            background-color: #007bff; /* Primary blue */
            border-color: #007bff; /* Primary blue */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue */
            border-color: #0056b3; /* Darker blue */
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Entry</h5>
                    </div>
                    <div class="card-body">
                        <form action="create.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload Photo:</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
