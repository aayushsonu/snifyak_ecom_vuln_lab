<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "ecommerce");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $review = $_POST['review'];

    $stmt = $mysqli->prepare("INSERT INTO reviews (product_id, user_id, review) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $user_id, $review);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Review added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to add review!</div>";
    }
    $stmt->close();
}

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h2>Leave a Review</h2>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="POST" class="mt-3">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea class="form-control" id="review" name="review"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning">
                <a href="login.php?redirect=review.php&product_id=<?php echo $product_id; ?>&message=Please login first before giving the review">Please login first before giving the review</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
