<?php


include("../../post/connection.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the database
$sql = "SELECT categoryid, categoryname FROM category";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch all products from the database
$sql = "SELECT productname, categoryid FROM addproduct";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>E-commerce Website</h1>
    <div id="categories">
        <?php foreach ($categories as $category): ?>
            <button onclick="filterProducts(<?php echo $category['categoryid']; ?>)">
                <?php echo $category['categoryname']; ?>
            </button>
        <?php endforeach; ?>
    </div>
    <div id="products">
        <?php foreach ($products as $product): ?>
            <div class="product" data-category="<?php echo $product['categoryid']; ?>">
                <?php echo $product['productname']; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function filterProducts(categoryId) {
            var products = document.getElementsByClassName('product');
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var category = product.getAttribute('data-category');
                if (category == categoryId || categoryId == 0) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
