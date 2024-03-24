<?php
session_start();
include("../../post/connection.php");
include("../../template/header.php");


$addcategoryquery = "SELECT * FROM category ORDER BY categoryid DESC";
$addcategoryresult = mysqli_query($conn, $addcategoryquery);

?>

<head>
    <style>
        .main-container {
            background-color: #25523B !important;
        }

        .box-container {

            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-container .col-md-6 {
            background-color: #fff;
           
        }

        .category-topic {
            color: #25523B;
        }

        .category-topic i {
            font-size: 22px;
        }
    </style>
</head>




<head>

</head>
<div class="container-fluid main-container">

    <div class="row d-flex justify-content-center align-items-center  box-container">

        <div class="col-md-6 p-5">
            <h3 class="text-center category-topic"> <i class="fa-solid fa-table-list"></i> View Category</h3>

            <?php

            if (isset($_SESSION["submitted"])) {
                echo '<div id="submitted" class="alert alert-success bg-secondary text-light">' . $_SESSION["submitted"] . '</div>';
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
                        <th class="border">Catagory-ID</th>
                        <th class="border">Catagory-name</th>
                        <th class="border">Catagory-Edit</th>
                        <th class="border">Catagory-Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($addcategoryrow = mysqli_fetch_assoc($addcategoryresult)) {
                        echo "<tr>";
                        echo "<td class='border'>" . $addcategoryrow['categoryid'] . "</td>";
                        echo "<td class='border'>" . $addcategoryrow['categoryname'] . "</td>";
                        echo "<td class='border'><a href='../../post/editcategory.php?edit=" . $addcategoryrow['categoryid'] . "' class='btn btn-dark btn-large form-control d-block m-auto'>Edit</a></td>";
                        echo "<td class='border'><a href='../../post/deletecategory.php?delete=" . $addcategoryrow['categoryid'] . "' class='btn btn-dark btn-large form-control d-block m-auto'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>