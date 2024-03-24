<?php
session_start();
include("../../post/connection.php");
include("../../template/header.php");
$addproductquery = "SELECT * FROM addproduct ORDER BY productid DESC";
$addproductresult = mysqli_query($conn, $addproductquery);

?>

<head>
    <style>
        /* body {
            overflow-x: hidden;
        } */
        .main-container {
            background-color: #25523B;
        }

        .box-container {

            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-container .col-md-10 {
            background-color: #fff;
            /* border-radius: 20px;  */
        }

        .category-topic {
            color: #25523B;
        }

        .category-topic i {
            font-size: 22px;
        }
    </style>
</head>



<!-- -----------------Alert messages for every actions------------------------------- -->


<div class="container-fluid main-container">

    <div class="row d-flex justify-content-center align-items-center  box-container p-5">

        <div class="col-md-10 p-5">

            <h4 class="text-center category-topic mb-5"> <i class="fa-solid fa-table-list"></i> View Product</h4>

            <?php

            if (isset($_SESSION["submitted"])) {
                echo '<div id="submitted" class="alert alert-success bg-secondary">' . $_SESSION["submitted"] . '</div>';
                unset($_SESSION['submitted']);
            }


            if (isset($_SESSION["Updated"])) {
                echo '<div id="Updated" class="alert alert-success bg-primary">' . $_SESSION["Updated"] . '</div>';
                unset($_SESSION['Updated']);
            }


            if (isset($_SESSION["Deleted"])) {
                echo '<div id="Deleted" class="alert alert-success">' . $_SESSION["Deleted"] . '</div>';
                unset($_SESSION['Deleted']);
            }
            ?>
            <table class="table border">
                <thead class="border">
                    <tr class="border">
                        <th class="border">Product-ID</th>
                        <th class="border">Product-Image</th>
                        <th class="border">Product-Name</th>
                        <th class="border">Product-code</th>
                        <th class="border">Product-description</th>
                        <th class="border">Product-price</th>
                        <th class="border">Product-status</th>
                        <th class="border">Product-Edit</th>
                        <th class="border">Product-Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($addproductrow = mysqli_fetch_assoc($addproductresult)) {
                        echo "<tr>";
                        echo "<td class='border'>" . $addproductrow['productid'] . "</td>";
                        echo "<td class='border'><img src='" . $addproductrow['productimage'] . "' style='width: 100px;'></td>";

                        echo "<td class='border'>" . $addproductrow['productname'] . "</td>";
                        echo "<td class='border'>" . $addproductrow['productcode'] . "</td>";
                        echo "<td class='border'>" . $addproductrow['productdescription'] . "</td>";
                        echo "<td class='border'>$" . $addproductrow['productprice'] . "</td>";

                        echo "<td class='border'>";
                        if ($addproductrow['productstatus'] == 1) {
                            echo "Enable";
                        } else {
                            echo "Disable";
                        }
                        echo "</td>";
                        echo "<td class='border'><a href='../../post/editproduct.php?edit=" . $addproductrow['productid'] . "' class='btn btn-primary'>Edit</a></td>";
                        echo "<td class='border'><a href='../../post/deleteproduct.php?delete=" . $addproductrow['productid'] . "' class='btn btn-secondary'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>