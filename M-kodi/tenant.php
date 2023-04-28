<?php
if(isset($_POST['Add']))
{
    include 'includes/connect.php';

    $building_name=$_POST["building_name"];
    $house_number=$_POST["house_number"];
    $password=$_POST["password"];
    
    $sql="INSERT INTO tenant (building_name,house_number, password) 
    VALUES('$building_name','$house_number','$password')";
    $result= mysqli_query($conn , $sql);
    if($result){
        header('location:./landlord1.php');
    }
    else{
        die(mysqli_error($conn));
    }

}
?>