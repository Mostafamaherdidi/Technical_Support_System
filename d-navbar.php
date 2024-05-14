<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            background-color: #343a40; /* Dark gray background color */
            color: #fff; /* Light text color */
        }
        
        .navbar {
            background-color: #212529; /* Darker navbar color */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important; /* Light text color for navbar links */
        }

        .navbar-toggler-icon {
            background-color: #fff; /* Light color for navbar toggler icon */
        }

        .form-inline .btn {
            color: #fff; /* Light text color for form button */
            border-color: #fff; /* Light border color for form button */
        }

        .form-inline .btn:hover {
            background-color: #fff; 
            color: #212529;
        }
        
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column; 
            }
        }

   
        @keyframes slideIn {
            from {
                transform: translateY(-50px); 
                opacity: 0; 
            }
            to {
                transform: translateY(0); 
                opacity: 1; 
            }
        }

        .navbar {
            animation: slideIn 0.5s ease-out; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Dern-Support</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    
              
                    <li class="nav-item">
                        <a class="nav-link" href="create_service.php">Repair Jobs</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form action="logout.php" method="POST" class="form-inline">
                            <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
