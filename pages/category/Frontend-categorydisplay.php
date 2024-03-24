<?php
include("../../post/connection.php");
include("../../template/header.php");



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the database
$sqlcategory = "SELECT categoryid, categoryname FROM category";
$result = $conn->query($sqlcategory);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch all products from the database
$sql = "SELECT * FROM addproduct";
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
    <link rel="stylesheet" href="../../assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper d-flex">
        <nav class="navbar navbar-expand-lg">
            <div class="container p-0">
                <div id="bdSidebar">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav d-flex flex-column">
                            <?php foreach ($categories as $category) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="filterProducts(<?php echo $category['categoryid']; ?>)">
                                        <?php echo $category['categoryname']; ?>
                                    </a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="products" class="p-5">
            <?php foreach ($products as $product) : ?>
                <div class="product" data-category="<?php echo $product['categoryid']; ?>">
                    <div class="img-cont">
                        <?php echo "<img src='../product/" . $product['productimage'] . "' alt='' class='product-img'>"; ?>
                    </div>
                    <hr>
                    <div class="description-box">
                        <h4 class="product-name pe-2"><?php echo $product['productname']; ?></h4>
                        <!-- <p><?php echo $product['productdescription']; ?></p> -->
                        <h5 class="py-2">$<?php echo $product['productprice']; ?></h5>
                        <button class="buy-now-btn btn btn-secondary d-block w-100">View Product</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>