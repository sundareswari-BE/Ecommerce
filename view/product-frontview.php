<?php
include("../post/connection.php");
include("header.php");

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['id']);


    $sql = "SELECT * FROM addproduct WHERE productid = '$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID not provided";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['productname']; ?> - Product Detail</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        .product-box{
    border: 1px solid #5c5c5c;
    border-radius: 10px;
    box-shadow: 0.5px 0.5px 10px #00000067 !important;
}
    </style>
</head>

<body>
    <div id="product" class="p-5" >
        <div class="container mt-5 ">
       
            
            <div class="row product-box p-5" data-aos="zoom-in">
            
            
                <div class="col-md-4">
              
                    <img   src="../pages/product/<?php echo $product['productimage']; ?>" alt="<?php echo $product['productname']; ?>" class="img-fluid" style="width: 100%; height: auto;">

         
            </div>
            
                <div class="col-md-8 mt-5">
  
                <h1 class="pb-5 mt-2"><?php echo $product['productname']; ?></h1>
                        <p><strong class="mt-5 ">Product-code:</strong> <?php echo $product['productcode']; ?></p>
                        <p><strong class="mt-5">Price:</strong> $<?php echo $product['productprice']; ?></p>
                        <p><strong class="mt-5">Description:</strong> <?php echo $product['productdescription']; ?></p>
                        <button class="btn btn-primary px-5 w-50">Buy Now</button>
                        <button class="buy-now-btn btn d-block w-50 mt-3">
                            <a href="..\enquiry\enquiry.php?id=<?php echo $product['productid']; ?>" class="text-decoration-none text-white">
                                Enquiry
                            </a>
                        </button>
                  
                </div>
            </div>
        </div>
    </div>
    <hr>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
    <?php include("footer.php");?>
</body>

</html>