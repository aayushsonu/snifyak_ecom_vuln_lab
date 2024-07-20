<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "ecommerce");

$sql = "SELECT * FROM products";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h2>Products</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <p class="card-text"><strong>$<?php echo htmlspecialchars($row['price']); ?></strong></p>
                            <a href="review.php?product_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary">Leave a Review</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>