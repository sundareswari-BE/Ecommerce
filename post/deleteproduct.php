<?php
session_start();
include ("connection.php");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete_data($conn, $id);
}

// delete data query
function delete_data($conn, $id){
    $query = "DELETE FROM addproduct WHERE productid = $id ";
    $exec = mysqli_query($conn, $query);

    if($exec){
        $_SESSION['Deleted'] = 'Deleted Successfully';
        header('location:../pages/product/viewproduct.php');
        exit();
    }else{
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}
?>
