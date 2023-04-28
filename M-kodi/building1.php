<?php
include 'includes/connect.php';
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
        header("Location: building1.php");
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
              <div>
                <?php
              if (isset($_SESSION['user_id'])) {
                 // display the user's username and a link to their account page
                    echo "Welcome, " . $house_number . "! <a href='account.php'>Account</a>";
                     } else {
                         // display a login link
                      echo "<a href='login.php'>Log in</a>";
                     }
                ?>
              </div>
                 <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                 <input type="hidden" name="confirm_logout" value="">
             </form>
             <div>
            
             </div>
            
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

  <div class="container" style="padding-top: 90px;">
    <h1 class="my-4">Tenant Page</h1>
    
    <!-- Dashboard -->
    <div class="card my-4">
      <h5 class="card-header">Dashboard</h5>
      <div class="card-body">
        <p class="card-text">Account balance: $500.00</p>
        <a href="#" class="btn btn-primary">View Payment History</a>
        <a href="#" class="btn btn-primary">Download Receipts</a>
      </div>
    </div>
    
    <!-- Make a Payment -->
    <div class="card my-4">
      <h5 class="card-header">Make a Payment</h5>
      <div class="card-body">
        <form method="post" action="building1_verification.php">
          <div class="form-group">
            <label for="paymentAmount">Payment Amount</label>
            <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" placeholder="$0.00">
          </div>
          <div class="form-group">
            <label for="paymentMethod">Payment Method</label>
            <select class="form-control" id="paymentMethod">
              <option>Credit Card</option>
              <option>Debit Card</option>
              <option>Bank Transfer</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
      </div>
    </div>
    
    <!-- Account Information -->
    <div class="card my-4">
      <h5 class="card-header">Account Information</h5>
      <div class="card-body">
        <form  method="post" action="building1_verification.php">
          <div class="form-group">
            <label for="name">Building name</label>
            <input type="text" class="form-control" id="name" name="building_name" value="<?php echo $building_name;?>" disable>
          </div>
          <div class="form-group">
            <label for="email">House number</label>
            <input type="text" class="form-control" id="house_number" name="house_number"  value="<?php echo $house_number;?>" disable >
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"  value="<?php echo $user['password'];?>">
          </div>
          <div class="form-group">
            <label for="leaseAgreement">Lease Agreement</label>
            <a href="#" class="form-control">Download Lease Agreement</a>
          </div>
          <button type="submit" class="btn btn-primary">Update Account Information</button>
        </form>
      </div>
    </div>
    
    <!-- Contact Us -->
    <div class="card my-4">
      <h5 class="card-header">Contact Us</h5>
      <div class="card-body">
        <form>
          <div class="form-group">
           
 
<?php
include 'includes/footer.php';
?>