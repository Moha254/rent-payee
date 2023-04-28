 <?php
$dbhost = "sql105.epizy.com";
$dbuser = "epiz_33844665";
$dbpass = "oSsLBxNKnB9767";
$dbname = "epiz_33844665_rent_payee_system";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die(mysqli_error($conn));
}

?>