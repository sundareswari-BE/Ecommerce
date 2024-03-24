<?php
session_start();
include("connection.php");
include("../template/header.php");

//-------------------------------------------------------- Validation in php ---------------------------------------------------------

$productnameErr = $productcodeErr = $productdescriptionErr = $productstatusErr = $imageuploadErr = $productpriceErr = "";
$productname = $productcode = $productdescription = $productstatus = $productprice = $imageupload = $target_file = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["productname"])) {
        $productnameErr = "Name is required";
    } else {
        $productname = $_POST["productname"];
    }

    if (empty($_POST["productcode"])) {
        $productcodeErr = "Product code is required";
    } else {
        $productcode = $_POST["productcode"];
    }

    if (!isset($_POST["productstatus"]) || ($_POST["productstatus"] !== "0" && $_POST["productstatus"] !== "1")) {
        $productstatusErr = "Invalid status";
    } else {
        $productstatus = $_POST["productstatus"];
    }


    if (empty($_POST["productdescription"])) {
        $productdescriptionErr = "Product description is required";
    } else {
        $productdescription = $_POST["productdescription"];
    }

    if (empty($_POST["productprice"])) {
        $productpriceErr = "Product-price is required";
    } else {
        $productprice = $_POST["productprice"];
    }
}


if (!isset($_GET['edit'])) {
    header("location:../invalid_page.php");
    exit();
}

$edit = $_GET['edit'];
$sql = "SELECT * FROM addproduct WHERE productid=$edit";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:../invalid_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = $_POST['productname'];
    $productcode = $_POST['productcode'];
    $productdescription = $_POST['productdescription'];
    $productprice = $_POST['productprice'];
    $productstatus = $_POST['productstatus'];
    // Handle file upload
    // $productimage = $_FILES['imageupload']['name'];
    // $temp_image = $_FILES['imageupload']['tmp_name'];
    // $target = "../path/to/upload/directory/" . basename($productimage);

    if (empty($productnameErr) && empty($productcodeErr) && empty($productdescriptionErr) && empty($productstatusErr) && empty($productpriceErr)) {

        $updateaddproduct = "UPDATE addproduct SET productname='$productname', productcode='$productcode', productdescription='$productdescription', productprice='$productprice', productstatus='$productstatus' WHERE productid=$edit";
        $result = mysqli_query($conn, $updateaddproduct);
        if ($result) {
            $_SESSION['Updated'] = 'Updated Successfully';
            header('location:../pages/product/viewproduct.php');
            exit();
        }

        //     if (move_uploaded_file($temp_image, $target) && mysqli_query($conn, $updateaddproduct)) {
        //         echo '<div class="alert alert-success" role="alert">Updated!</div>';
        //         header("location:../pages/viewproduct.php");
        //         exit();
        //     } else {
        //         echo '<div class="alert alert-danger" role="alert">Error updating product.</div>';
        //     }
    }
}

?>

<head>
    <style>
        .box-container {
            background-color: #25523B;
            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-container .col-md-6 {
            background-color: #fff;
            /* border-radius: 20px;  */
        }

        .category-topic {
            color: #25523B;
        }

        .category-topic i {
            font-size: 24px;
        }
    </style>


<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center box-container p-5 ">

            <div class="col-md-6 p-5">

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?edit=' . $_GET['edit'];; ?> " -enctype="multipart/form-data">

                    <h3 class="text-center category-topic mb-5"> Edit Product</h3>

                    <div class="form-group">
                        <label for="productname">Product Name:</label>
                        <input type="text" class="form-control" name="productname" placeholder="Enter the product name" value="<?php echo ($row['productname']); ?>">
                        <span class="error">
                            *
                            <?php echo $productnameErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="productcode">Product Code:</label>
                        <input type="text" class="form-control" name="productcode" placeholder="Enter the product code" value="<?php echo htmlspecialchars($row['productcode']); ?>">
                        <span class="error">
                            *
                            <?php echo $productcodeErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="productdescription">Product Description:</label>
                        <textarea rows="4" cols="3" class="form-control" name="productdescription" placeholder="Enter the product description"><?php echo htmlspecialchars($row['productdescription']); ?></textarea>
                        <span class="error">
                            *
                            <?php echo $productdescriptionErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="productprice">Product Price:</label>
                        <input type="text" class="form-control" name="productprice" placeholder="Enter the product-price" value="<?php echo htmlspecialchars($row['productprice']); ?>">
                        <span class="error">
                            *
                            <?php echo $productpriceErr; ?>
                        </span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="productstatus">Status:</label>
                        <select class="form-control" name="productstatus">
                            <option>Product-status</option>
                            <option value="1" <?php echo ($row['productstatus'] == '1') ? 'selected' : ''; ?>>Enable
                            </option>
                            <option value="0" <?php echo ($row['productstatus'] == '0') ? 'selected' : ''; ?>>Disable
                            </option>
                        </select>
                        <span class="error">
                            *
                            <?php echo $productstatusErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="imageupload">Choose Image:</label>
                        <input type="file" class="form-control-file" id="imageupload" name="imageupload">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
</body>