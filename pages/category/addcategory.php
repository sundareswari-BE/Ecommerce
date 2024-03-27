<?php

session_start();
include("../../post/connection.php");

//    ----------------------condition for checking login------------------


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
 
    header("location:..\..\index.php");
    exit;
   }



include("../../template/backend-header.php");


$categorynameErr = "";
$categoryname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["categoryname"])) {
        $categorynameErr = "Category-Name is required";
    } else {
        $categoryname = $_POST["categoryname"];
    }


    if (empty($categorynameErr)) {

        $sql = "INSERT INTO category (categoryname) VALUES ('$categoryname')";

        $done = mysqli_query($conn, $sql);
        if ($done) {
            $_SESSION['submitted'] = 'Submitted Successfully';
            header('location:viewcategory.php');
            exit();
        }
    }
}
?>

<head>
    <style>
        body {
            overflow-x: hidden;
        }

        .box-container {
            background-color: #25523B;
             height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-container .col-md-6{
            background-color: #fff;
             border-radius: 20px; 
        }
        .category-topic {
            color:#25523B;
        }
        .category-topic i{
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="row d-flex justify-content-center align-items-center box-container ">

        <div class="col-md-6 p-5">
            <h3 class="text-center category-topic"><i class="fa-solid fa-circle-plus"></i> Add Category</h3>
            <form action="" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md mt-4">
                            <label for="categoryName">Category Name</label>
                            <input type="text" name="categoryname" class="categoryname form-control" id="categoryName" placeholder="Enter categoryname.">
                            <span class="error"><?php echo $categorynameErr; ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md mt-3">
                            <button type="submit" class="btn btn-primary btn-large form-control d-block m-auto">Submit</button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>
    <?php include("../../template/backend-footer.php");?> 
