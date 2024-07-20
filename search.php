<?php
session_start();
include 'navbar.php'; // Include the navbar with the search box

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'ecommerce';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get the search query from the URL
$search = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare the SQL query to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM products WHERE name LIKE ?");
$search_param = '%' . $search . '%';
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Search Results for : <?php echo $search; ?></h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="https://via.placeholder.com/150" class="card-img-top" alt="' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</h5>';
                    echo '<p class="card-text">Price: $' . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . '</p>';
                    echo '<p class="card-text">' . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . '</p>';
                    echo '<a href="product.php?id=' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '" class="btn btn-primary">View Details</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-muted">No products with id ';
                echo $search;  
                echo ' found matching your search query.</p>';
            }

            // Close the statement and connection
            $stmt->close();
            $mysqli->close();
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
