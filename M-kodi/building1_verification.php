<?php
include 'includes/connect.php';
// Make a Payment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paymentAmount']) && isset($_POST['paymentMethod'])) {
  $amount = $_POST['paymentAmount'];
  $method = $_POST['paymentMethod'];
  
  // Insert payment record into database
  $sql = "INSERT INTO payments (amount, method) VALUES ('$amount', '$method')";
  
  if (mysqli_query($conn, $sql)) {
    echo "Payment submitted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Update Account Information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['house_number']) && isset($_POST['password'])) {
  $house_number = $_POST['house_number'];
  $password = $_POST['password'];
  
  // Update account information in database
  $sql="UPDATE tenant SET house_number='$house_number', `password` ='$password' WHERE id=1";
  if (mysqli_query($conn, $sql)) {
    echo "Account information updated successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

?>
