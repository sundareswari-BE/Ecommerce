<?php
include("../post/connection.php");
include("header.php");



$sqlcategory = "SELECT categoryid, categoryname FROM category";
$result = $conn->query($sqlcategory);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}


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
    <link rel="stylesheet" href="../assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
   
   <style>
@media (max-width: 767px) {
    .wrapper {
        flex-direction: column;
    }

    .navbar {
        flex-direction: column;
    }

    .navbar-collapse {
        margin-top: 10px;
    }

    .navbar-toggler {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .nav-item {
        text-align: center;
    }

    .product {
        width: 100%;
    }

    .description-box {
        text-align: center;
    }
}


@media (min-width: 768px) and (max-width: 991px) {
    
}


@media (min-width: 992px) {
    
}
</style>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesNavbar" aria-controls="categoriesNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="categoriesNavbar">
                <ul class="navbar-nav">
                   
                    <?php foreach ($categories as $category) : ?>
                        <li class="nav-item py-2 ">
                            <a class="nav-link" href="#" onclick="filterProducts(<?php echo $category['categoryid']; ?>)">
                               <h5 class="btn btn-secondary"> <?php echo $category['categoryname']; ?> </h5>
                            </a>
                        </li>
                    <?php endforeach; ?>
                   
                </ul>
            </div>
        </div>
    </nav>

        <div id="products" class="p-5"   >
            <?php foreach ($products as $product) : ?>
                <div class="product me-3" data-category="<?php echo $product['categoryid']; ?>">
                    <div class="img-cont">
                        <?php echo "<img src='../pages/product/" . $product['productimage'] . "' alt=''>"; ?>
                    </div>
                    <hr>
                    <div class="description-box">
                        <h4 class="product-name"><?php echo $product['productname']; ?></h4>
                        <h5>$<?php echo $product['productprice']; ?></h5>
                        <button class="buy-now-btn btn d-block w-100">
                            <a href="product-frontview.php?id=<?php echo $product['productid']; ?>" class="text-decoration-none text-white">
                                View product
                            </a>
                        </button>

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

    <hr>
    <?php include("footer.php");?>
    
