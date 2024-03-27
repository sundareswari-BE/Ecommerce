<?php
session_start();
include ("connection.php");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete_data($conn, $id);
}


function delete_data($conn, $id){
 
$query = "DELETE FROM category WHERE categoryid = $id";
$exec = mysqli_query($conn, $query);


if ($exec) {
   
    $deleteProductsQuery = "DELETE FROM addproducts WHERE categoryid = $id";
    $execDeleteProducts = mysqli_query($conn, $deleteProductsQuery);

    if ($execDeleteProducts) {
        echo "Category and associated products have been deleted successfully.";
    } else {
        echo "Failed to delete associated products.";
    }
} else {
    echo "Failed to delete category.";
}

}
?>
