<?php
 include 'includes/connect.php';
 $id = $_GET['updateid'];
$sql= "SELECT * FROM `tenant` WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$building_name = $row['building_name'];
$house_number = $row['house_number'];
$password = $row['password'];
 
if(isset($_POST['update']))
{
    $building_name=$_POST['building_name'];
    $house_number=$_POST['house_number'];
    $password=$_POST['password'];
    
    $sql="UPDATE tenant SET id=$id,building_name='$building_name',house_number='$house_number', `password` ='$password' WHERE id=$id";
    $result= mysqli_query($conn , $sql);
    if($result){
        header('location:./landlord1.php');
    }
    else{
        die(mysqli_error($conn));
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="tenant.css">
    <script src="/mohan.js"></script>
    <title>M-kodi</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark py-3" style="background: linear-gradient(109.6deg, rgb(0, 0, 0) 11.2%, rgb(11, 132, 145) 91.1%);">
        <div class="container-fluid ">
            <nav class="navbar navbar-dark">
                <div class="row">
                    <div class="col-1">
                        <a class="navbar-brand" href="#">
                            <img src=".\images\logo.png" alt="" width="45" height="39" class="d-inline-block ">
                          <b>M-kodi</b> 
                          </a>
                    </div>
                 
                </div>
              </nav>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex" method="post">
                 <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                 <input type="hidden" name="confirm_logout" value="">
             </form>
             <script>
                     var logoutButton = document.getElementsByName('logout')[0];
                      logoutButton.addEventListener('click', function(event) {
                     var confirmLogout = confirm("Are you sure you want to logout?");
                      if(!confirmLogout) {
                       event.preventDefault(); // prevent form submission if the user selects "no"
                       } else {
                       document.getElementsByName('confirm_logout')[0].value = 'yes'; // set the value of the hidden input to "yes"
                        }
                        });
              </script>
          </div>
        </div>
      </nav>
<script>
     <?php
       session_start();
       if (isset($_SESSION['message'])) {
         echo "alert('" . $_SESSION['message'] . "');";
          unset($_SESSION['message']);
        }
       ?>
</script>
<br>
<div id="id02" class="container mt-20" >
        <form class=" container modal-content animate my-10" style="padding-top: 50px; margin-top:50px;" method="POST">
            <div class="container mt-50">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="close modal">&times;</span>
                <div class="text-center">
                   <img src=".\images\logo.png" alt="" width="75" height="64" class="d-inline-block ">
                </div>
            </div>
            <div class="container" >
              <label for="house"><b>Enter Name Of The Appartment</b></label>
                <input type="text" name="building_name" value="<?php echo $building_name;?>" >

                <label for="house"><b>House Number</b></label>
                <input type="text" name="house_number"  value="<?php echo $house_number;?>">

                <label for="house"><b>password</b></label>
                <input type="text" name="password"  value="<?php echo $password;?>">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                </div>
                <br>
            </div>
        </form>
        </div>
