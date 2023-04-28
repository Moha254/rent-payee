<?php
if(isset($_GET['deleteid'])){
    include 'connect.php';
    $id = mysqli_real_escape_string($conn, $_GET['deleteid']);
    $sql="DELETE FROM `tenant` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:../landlord1.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
else{
    header('location:../landlord1.php');
    }

?>