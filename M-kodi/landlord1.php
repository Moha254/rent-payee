<?php
session_start();

if(isset($_POST['logout'])){
    $confirm_logout = $_POST['confirm_logout'];
    if($confirm_logout == 'yes'){
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        // If the user selects "no", stay on the same page
        header("Location: building.php");
        exit();
    }
}
if(isset($_POST['update'])){
    $confirm_logout = $_POST['confirm_logout'];
    if($confirm_logout == 'yes'){
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: update.php");
        exit();
    } else {
        // If the user selects "no", stay on the same page
        header("Location: landlord1.php");
        exit();
    }
}
if(isset($_POST['delete'])){
    $confirm_delete = $_POST['confirm_delete'];
    if($confirm_delete == 'yes'){
        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: includes/delete.php");
        exit();
    } else {
        // If the user selects "no", stay on the same page
        header("Location: landlord1.php");
        exit();
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
    <title>Document</title>
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
<div class="card border-dark mb-3" style="max-width: auto; padding-top: 100px;">
  <div class="card-header fs-3 text-center">Welcome On Board Mr/Mrs Landlord</div>
  <div class="card-body text-dark">
    <h5 class="card-title text-center">How To Go With The System</h5>
    <p class="card-text text-center">
      <div class="row">
        <div class="col border">
         <h1>How To Add Tenant</h1>
         <p>1). Click on the "Add Tenant" button. <br>
            2). Enter the tenant's details, Appartment name, House number, and password of their own choice. <br>
            3). Click the "Add" button to save the tenant's information.</p>
        </div>
        <div class="col border">
        <h1>How To Update Their Details</h1>
         <p>1). Find the tenant you want to update in the list of tenants. <br>
            2). Click the "Update" button next to the tenant's information.<br>
            3). Edit the tenant's details as needed. <br>
            4). Click the "Submit" button to save the updated information. 
          </p>
        </div>
        <div class="col border">
        <h1>How To Delete Their Details</h1>
         <p>1).  Find the tenant you want to delete in the list of tenants. <br>
            2). Click the "Delete" button next to the tenant's information.<br>
            3). Confirm that you want to delete the tenant by clicking the "Yes" button in the confirmation pop-up. 
          </p>
        </div>
      </div>
    </p>
    <p class="card-text text-center"><button type="button" class="btn btn-outline-primary text-light" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Add Tenant</button>
              </div>
            </div>
          </div>
    </div>
    <div id="id03" class="modal">
        <form class="modal-content animate" action="tenant.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id03').style.display='none'" class="close" title="close modal">&times;</span>
                <img src=".\images\logo.png" alt="" width="75" height="64" class="d-inline-block ">
            </div>
            <div class="container">
                <div class="mb-3">
                   <label for="apartment name"  class="form-label"><b>Enter Name Of The Appartment</b></label>
                    <input type="text"  class="form-control" name="building_name" placeholder="Enter Name Of The Appartment" required autocomplete="off">
                 </div>
                <div class="mb-3">
                   <label for="house"  class="form-label"><b>House Number</b></label>
                   <input type="text" class="form-control" name="house_number" placeholder="Enter House Number" required autocomplete="off">
                 </div>
                <div class="mb-3">
                 <label for="password"  class="form-label"><b>Password</b></label>
                 <input type="password" class="form-control" name="password" placeholder="Enter The Number You Pay Rent With" required autocomplete="off">
                 </div>
                 <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="Add">Add</button>
                </div>
  </div>
</div>
<div class="container">
		<h1 class="text-center";>Your Tenants</h1>
		<table class="table table-hover">
			<thead>
				<tr>
        <th>id</th>
        <th>Appartment name</th>
        <th>house number</th>
        <th>password</th>
        <th>Operation</th>
				</tr>
			</thead>
      <tbody>
        <?php
        include 'includes/connect.php';
        $sql= "SELECT * FROM `tenant`";
        $result = mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $building_name = $row['building_name'];
            $house_number = $row['house_number'];
            $password = $row['password'];
            echo'
            <tr>
               <td>'.$id.'</td>
               <td>'.$building_name.'</td>
               <td>'.$house_number.'</td>
               <td>'.$password.'</td>
               <td>
               <button class="btn btn-primary text-light btn-hover" name="update"><a href="./update.php?updateid='.$id.'">Update</a></button>
               <button class="btn btn-primary text-light"  name="delete" style=" background-color:#e71d0e;"><a href="./includes/delete.php?deleteid='.$id.'">Delete</a></button>
               </td>
             </tr>
            ';
            }
        }
        ?> 
     </tbody> 
		</table>
	</div>
        <script> 
        
          var updateButtons = document.getElementsByName('update');

         for (var i = 0; i < updateButtons.length; i++) {
          updateButtons[i].addEventListener('click', function(event) {
           var confirmupdate = confirm("Are you sure you want to update details?");
           if (!confirmupdate) {
            event.preventDefault(); // prevent form submission if the user selects "no"
          } else {
          document.getElementsByName('confirm_update')[i].value = 'yes'; // set the value of the hidden input to "yes"
          }
            });
         }
        
          var deleteButtons = document.getElementsByName('delete');

                 for (var i = 0; i < updateButtons.length; i++) {
                  deleteButtons[i].addEventListener('click', function(event) {
                  var confirmdelete = confirm("Are you sure you want to delete the tenant?");
                  if (!confirmdelete) {
                  event.preventDefault(); // prevent form submission if the user selects "no"
                   } else {
                  document.getElementsByName('confirm_delete')[i].value = 'yes'; // set the value of the hidden input to "yes"
            }
            });
              }
     </script>
<?php
include 'includes/footer.php';
?>