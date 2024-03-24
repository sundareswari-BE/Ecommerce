<?php
session_start();
include ("connection.php");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete_data($conn, $id);
}

// delete data query
function delete_data($conn, $id){
    $query = "DELETE FROM category WHERE categoryid = $id ";
    $exec = mysqli_query($conn, $query);

    if($exec){
        $_SESSION['Deleted'] = 'Deleted Successfully';
        header('location:../pages/category/viewcategory.php');
        exit();
    }else{
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}
?>
