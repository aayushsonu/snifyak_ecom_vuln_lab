<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to E-commerce Platform</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: url('https://cdn.pixabay.com/photo/2018/08/29/17/07/ecommerce-3640321_1280.jpg') no-repeat center center;
            background-size: cover;
            color: black;
            text-align: center;
            padding: 100px 0;
        }

        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="hero-section">
        <div class="container">
            <h1>Welcome to SnifyAk E-commerce Platform</h1>
            <p>Your one-stop shop for the best products</p>
            <a href="products.php" class="btn btn-primary btn-lg">Explore Products</a>
        </div>
    </div>

    <div class="container">
        <h2 class="mt-5">About Us</h2>
        <p>We offer a wide range of products to meet your needs. Our platform is designed to provide a seamless shopping experience with secure transactions and excellent customer service.</p>
        <p>Sign up today to start exploring and enjoy exclusive offers!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>