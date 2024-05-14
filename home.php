<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dern-Support</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS styles */
        body {
     
            background-color: black; /* Dark background */
            color: #000; 
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .jumbotron {
            background-color: black; /* Dark background */
            color: black;
            padding: 100px 0;
            text-align: center;
            border-radius: 0;
        }
        .jumbotron h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .jumbotron p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .features {
            margin-top: 50px;
        }
        .feature {
            text-align: center;
            padding: 20px;
            background-color: #000; /* Black feature background */
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .feature img {
            width: 100%; /* Make the image fill the entire width of the card */
            height: 200px; /* Set a fixed height to maintain aspect ratio */
            object-fit: cover; /* Scale the image to cover the entire space */
            border-radius: 10px 10px 0 0; /* Add border radius to match the card */
        }
        .feature h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .feature p {
            font-size: 16px;
        }
        .feature:hover {
            transform: translateY(-5px);
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include_once 'navbar.php'; ?>




<div class="container-fluid">
  <!-- Your content here -->
</div>
    <div class="container features">
        <div class="row">
            <div class="col-md-4">
                <div class="feature">
                    <img src="https://imgs.search.brave.com/Bk3dwAr1ZwTeTyOcKQx3L7OmwV0HWK32WjpmXwuOu4c/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvNjM5/NzM1ODU2L3Bob3Rv/L2hlbHBmdWwtY3Vz/dG9tZXItc2Vydmlj/ZS5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9MWRSWXMyRzRN/T1VtREI4QmFNd2NM/b25iR0VWS1Bpd0l5/WVNGMDhLTU1oUT0" alt="Customer Support">
                    <h3>Customer Support</h3>
                    <p>24/7 support for businesses and individuals</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature">
                    <img src="https://imgs.search.brave.com/CtDagZiiHr6w8_Xn0U2Ns1fUCUuP-6kXdSjA9rAWwzU/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTMx/MTM3NzIxMS9waG90/by9jb21wdXRlci1y/ZXBhaXJtYW4uanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPWt6/Yy1jU1IyalJvSG1m/UkZ4eDNfRXdWRFJT/bDE1Q1l2S05hV1Nr/NWhWWUk9" alt="Computer Repair">
                    <h3>Computer Repair</h3>
                    <p>On-site and remote repairs for all types of computer systems</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature ">
                    <img src="https://imgs.search.brave.com/SmembsPukLgLG4-gnXqvnu4nN47B1ncSMAoi60XORRs/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzA0LzMwLzk4Lzc1/LzM2MF9GXzQzMDk4/NzU1M19MdmpNMTVD/dHRJVmlSZDFPNHlT/djdSZnEwUEdxekhr/Qi5qcGc" alt="Knowledge Base">
                    <h3>Knowledge Base</h3>
                    <p>Access troubleshooting guides and DIY solutions</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
