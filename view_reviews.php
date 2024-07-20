<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "ecommerce");

$product_id = $_GET['product_id'];

$sql = "SELECT * FROM reviews WHERE product_id='$product_id'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h2>Reviews</h2>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text"><?php echo $row['review']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>