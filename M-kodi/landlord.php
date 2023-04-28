<?php
if(isset($_POST['login'])){
    include 'includes/connect.php';
    $building_name = mysqli_real_escape_string($conn, $_POST['building_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($building_name) || empty($password)){
        header("location:index.php?<script>windows('error=access forbidden')</script>");
    exit();
    } 
    else{
        $sql="SELECT * FROM landlord WHERE building_name= ?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location:./index.php?<script>windows('error=sql error')</script>");
    exit();
        }
        else{
            mysqli_stmt_bind_param($stmt , "s", $building_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){

                if($password !== $row['password']){
                    session_start();
                    $_SESSION['message'] = "wrong password";
                    header("location: index.php");
                    exit();
                }
                elseif(!preg_match("/^[a-z A-Z 0-9]*/", $building_name)){
                    header("location:./index.php?invalid username");
                    exit();
                }
                elseif($password == $row['password']){
                    session_start();
                    $_SESSION['sessionid'] = $row['id'];
                    $_SESSION['sessionuser'] = $row['building_name'];
                    session_start();
                     $_SESSION['message'] = "welcome mr/mrs landlord";
                     header("location:landlord1.php");
                    exit();
                    
                }
                else{ session_start();
                    $_SESSION['message'] = "Wrong Password";
                    header("location:./index.php");
                    exit();
                }
            }
            else{
                session_start();
                $_SESSION['message'] = "Uknown Building";
                header("location:./index.php");
                exit();
            }
        }
        
    }

}
else{
    session_start();
    $_SESSION['message'] = "access forbidden";
    header("location:./index.php");
    exit();
}
  
// Check if "Remember Me" checkbox is checked
if (isset($_POST['remember_me'])) {
  // Create a unique identifier for the user
  $identifier = hash('sha256', $_POST['building_name'] . $_SERVER['REMOTE_ADDR']);

  // Encrypt the identifier
  $secure_identifier = encrypt($identifier);

  // Store the encrypted identifier in a cookie
  setcookie("remember_me", $secure_identifier, time() + (30 * 24 * 60 * 60), "/");
}

// Function to encrypt the identifier
function encrypt($data) {
  // Use a strong encryption algorithm and key to encrypt the data
  return base64_encode(openssl_encrypt($data, 'AES-256-CBC', ENCRYPTION_KEY));
}
?>

