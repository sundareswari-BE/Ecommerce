<?php
session_start();
include("connection.php");
include("../template/backend-header.php");

$categorynameErr = "";
$categoryname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["categoryname"])) {
        $categorynameErr = "Category-Name is required";
    } else {
        $categoryname = $_POST["categoryname"];
    }
}

if (!isset($_GET['edit'])) {
    header("location:../invalid_page.php");
    exit();
}

$edit = $_GET['edit'];
$sql = "SELECT * FROM category WHERE categoryid=$edit";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:../invalid_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($categorynameErr)) {
        $updatecategory = "UPDATE category SET categoryname='$categoryname' WHERE categoryid=$edit";
        $result = mysqli_query($conn, $updatecategory);
        if ($result) {
            $_SESSION['Updated'] = 'Updated Successfully';
            header('location:../pages/category/viewcategory.php');
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

        .box-container .col-md-6 {
            background-color: #fff;
            border-radius: 20px;
        }

        .category-topic {
            color: #25523B;
        }

        .category-topic i {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="row d-flex justify-content-center align-items-center box-container ">

        <div class="col-md-6 p-5">
            <h3 class="text-center category-topic"><i class="fa-solid fa-circle-plus"></i> Edit Category</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?edit=' . $_GET['edit']; ?>" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md mt-4">
                            <input type="text" name="categoryname" class="categoryname form-control" placeholder="Enter categoryname." value="<?php echo htmlspecialchars($row['categoryname']); ?>">
                            <span class="error"><?php echo $categorynameErr; ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md mt-3">
                            <button type="submit" class="btn btn-primary  btn-large form-control d-block m-auto">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <?php include("../template/backend-footer.php");?>