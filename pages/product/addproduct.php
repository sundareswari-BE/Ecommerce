<?php
session_start();
include("../../post/connection.php");
include("../../template/header.php");


//-------------------------------------------------------- Validation in php ---------------------------------------------------------


$productnameErr = $productcodeErr = $productdescriptionErr = $productstatusErr = $imageuploadErr = $productpriceErr = $categoryErr = "";
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

    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = $_POST["category"];
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

    if (empty($productnameErr) && empty($productcodeErr) && empty($productdescriptionErr) && empty($productstatusErr) && empty($productpriceErr)) {

        // ----------------------------- File uploading process after validating -----------------------


        if (isset($_FILES["imageupload"]) && $_FILES["imageupload"]["error"] == 0) {


            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //setting the path to store the selected image


            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imageupload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;                  //checked selected file is an image or not
                }
            }

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;                         //cheked the image is duplicate one or not
            } else {


                if ($_FILES["imageupload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                } else {


                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" && $imageFileType != "Webp"
                    ) {
                        echo "Sorry, only JPG, JPEG, PNG ,webp & GIF files are allowed.";
                        $uploadOk = 0;
                    } else {

                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        } else {
                             if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file)) {


                                // ------------------------------------------------------Inserting data in database ------------------------------------------------------

                                $productname = $_POST['productname'];
                                $productcode = $_POST['productcode'];
                                $productdescription = $_POST['productdescription'];
                                $productprice = $_POST['productprice'];
                                $productstatus = $_POST['productstatus'];
                                $category = $_POST["category"];
                            
                                $categorysql = "SELECT * FROM category WHERE  categoryname = '$category' ";
                                $result = $conn->query($categorysql);

                                if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                                    $categoryid = $row["categoryid"];
                                }



                                $sql = "INSERT INTO addproduct (productname, productcode, productdescription, productprice, productstatus,productimage,categoryid) VALUES ('$productname', '$productcode', '$productdescription', '$productprice', '$productstatus','$target_file','$categoryid')";
                                $done = mysqli_query($conn, $sql);
                                if ($done) {
                                    $_SESSION['submitted'] = 'Submitted Successfully';
                                    echo '<script>window.location.href = "viewproduct.php";</script>';
                                    exit();
                                } else {
                                }
                            }
                        }
                    }
                }
            }
        }
         else {
            $imageuploadErr = "Error uploading file";
        }
    }
}

// ---------------------------------------------------------add category from db---------------------------------------------
$category = array();
$fetchcategory = "SELECT categoryname FROM category ";
$fetchcategoryresult = mysqli_query($conn, $fetchcategory);
if ($fetchcategoryresult) {
    while ($fetchcategoryrow  = mysqli_fetch_assoc($fetchcategoryresult)) {
        $category[] = $fetchcategoryrow["categoryname"];
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

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " enctype="multipart/form-data">

                    <h3 class="text-center category-topic mb-5"><i class="fa-solid fa-circle-plus"></i> Add Product</h3>






                    <div class="form-group">

                        <!-- <label for="productname">Product Name:</label> -->
                        <input type="text" class="form-control" name="productname" placeholder="Enter the product name" value="<?php echo isset($productname) ? $productname : ''; ?>">
                        <span class="error">
                            *
                            <?php echo $productnameErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <!-- <label for="productcode">Product Code:</label> -->
                        <input type="text" class="form-control" name="productcode" placeholder="Enter the product code" value="<?php echo isset($productcode) ? $productcode : ''; ?>">
                        <span class="error">
                            *
                            <?php echo $productcodeErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <!-- <label for="productdescription">Product Description:</label> -->
                        <textarea rows="4" cols="3" class="form-control" name="productdescription" placeholder="Enter the product description"><?php echo isset($productdescription) ? $productdescription : ''; ?></textarea>

                        <span class="error">
                            *
                            <?php echo $productdescriptionErr; ?>
                        </span>
                    </div>



                    <div class="form-group">
                        <!-- <label for="productprice">Product Price:</label> -->
                        <input type="text" class="form-control" name="productprice" placeholder="Enter the product price" value="<?php echo isset($productprice) ? $productprice : ''; ?>">
                        <span class="error">
                            *
                            <?php echo $productpriceErr; ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="productstatus">Product Status:</label>
                        <select name="productstatus" class="form-control">
                            <option value="1" <?php if (isset($_POST['productstatus']) && $_POST['productstatus'] == '1') echo 'selected'; ?>>Enable</option>
                            <option value="0" <?php if (isset($_POST['productstatus']) && $_POST['productstatus'] == '0') echo 'selected'; ?>>Disable</option>
                        </select>
                        <span class="error"><?php echo $productstatusErr; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="imageupload">Choose Image:</label>
                        <input type="file" class="form-control-file" id="imageupload" name="imageupload">
                        <span class="error"><?php echo $imageuploadErr; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-control">
                            <option>Select-category</option>
                            <?php foreach ($category as $cat) {
                                echo "<option value='$cat' " . (isset($_POST['category']) && $_POST['category'] == $cat ? 'selected' : '') . ">$cat</option>";
                            } ?>
                        </select>
                        <span class="error"><?php echo $categoryErr; ?></span>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>


                </form>
            </div>
        </div>
    </div>
</body>
<!-- <?php include("../template/footer.php"); ?> - -->