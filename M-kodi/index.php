<?php
include 'includes/header.php';
?>
<script>
  <?php
  session_start();
  if (isset($_SESSION['message'])) {
    echo "alert('" . $_SESSION['message'] . "');";
    unset($_SESSION['message']);
  }
  ?>
</script> 

      <div class="container-fluid " style="padding-top: 90px;">
        <div class="card mb-3 border border-primary">
            <img src=".\images\est log.jpg" class="card-img-top" alt="logo" >
            <div class="card-body">
              <h5 class="card-title"><strong>M-kodi in simple terms</strong></h5>
              <p class="card-text"><b><i>M-kodi is a rent payee system that allows tenants to easily and conveniently pay their rent using their mobile phones. The system is designed to make rent payments hassle-free and efficient, by allowing tenants to make payments at any time, from anywhere, using their mobile phone.

                To make payments with M-kodi, tenants can simply register for the service and link their mobile phone number to their rent account. They can then use the mobile phone to access their rent account and make payments with a few clicks. The system is secure and reliable, ensuring that tenants' rent payments are processed quickly and safely.
                
                To process the rent payments, M-kodi utilizes a secure and reliable payment processing platform. This platform can be integrated with various payment methods, including mobile money payments, debit or credit card payments, and other online payment options. This allows tenants to choose a payment method that is convenient for them, and ensures that payments are processed quickly and efficiently.
                
                M-kodi's payment processing system utilizes advanced technology, including the latest application programming interfaces (APIs), to ensure that the payment process is seamless and reliable. For example, M-kodi may use the M-Pesa Daraja API to integrate mobile money payments with the system, allowing tenants to make payments with their mobile money accounts. However, regardless of the specific APIs used, M-kodi's payment processing system is designed to provide a secure and reliable payment experience for tenants.
                
                Overall, M-kodi is a rent payee system that makes it easy and convenient for tenants to pay their rent using their mobile phones. With its user-friendly interface and secure payment processing system, M-kodi provides a hassle-free and efficient way for tenants to manage their rent payments.</i></b></p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
        <div class="card-group ">
            <div class="card m-5 border border-primary">
              <img src=".\images\image.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Login as a Landlord</h5>
                <p class="card-text">If you've already Registered by the Admin you can enter your building name for Redirection</p>
                <p class="card-text"><button type="button" class="btn btn-outline-primary text-light" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Landlord</button>
              </div>
            </div>
            <div class="card m-5 border border-primary">
              <img src=".\images\tenant logo.jpg" class="card-img-top" alt="Tenant logo" style="height: 430px;">
              <div class="card-body">
                <h5 class="card-title">Login as a Tenant</h5>
                <p class="card-text">If you've already Registered by Landlord you can enter the specific details to enter the Platform </p>
                <p class="card-text"><button type="button" class="btn btn-outline-primary text-light" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tenant</button>

              </div>
            </div>
          </div>
    </div>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="tenant_verification.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="close modal">&times;</span>
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
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </div>
                <br>
                <h4 style="color:#000;">Remember me</h4><input type="checkbox" checked="checked" >
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <div class="row">
                <div class="col d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('id01').style.display='none'">cancel</button>
                </div>
                <div class="col mx-3">
                    <span class=""><h5 style="color:#000;">forgot <a href="#">password ?</a> </h5> </span>
                </div>
            </div>

            </div>
         </form>
        </div>
        <br>
        <div id="id02" class="modal">
        <form class="modal-content animate" action="landlord.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="close modal">&times;</span>
                <img src=".\images\logo.png" alt="" width="75" height="64" class="d-inline-block ">
            </div>
            <div class="container">
                <div class="mb-3">
                   <label for="apartment name"  class="form-label"><b>Enter Name Of The Appartment</b></label>
                    <input type="text"  class="form-control" name="building_name" placeholder="Enter Name Of The Appartment" required autocomplete="off">
                 </div>
                <div class="mb-3">
                 <label for="password"  class="form-label"><b>Password</b></label>
                 <input type="password" class="form-control" name="password" placeholder="Enter The Number You Pay Rent With" required autocomplete="off">
                 </div>
                 <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </div>
                <br>
                <h4 style="color:#000;">Remember me</h4><input type="checkbox" checked="checked" >
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <div class="row">
                <div class="col d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('id02').style.display='none'">cancel</button>
                </div>
                <div class="col mx-3">
                    <span class=""><h5 style="color:#000;">forgot <a href="#">password ?</a> </h5> </span>
                </div>
            </div>

            </div>
         </form>
        </div>

        <?php
include 'includes/footer.php';
?>