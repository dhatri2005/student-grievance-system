<?php
session_start();
require_once "inc/conn.php";

$name      = $_POST["name"];
$email     = $_POST["emailAddress"];
$phonenum  = $_POST["phoneNumber"];
$idNumber  = $_POST["idNumber"];
$password  = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

// Debug (remove later)
echo "Debug - Name: $name, Email: $email, Phone: $phonenum, ID: $idNumber<br>";

if ($confirmPassword != $password) {
    echo '<script>alert("Password Not Same")</script>';
    header("refresh:0;url=register_admin.php?error=password_mismatch");
    exit();
}

// check if email already exists
$sql = "SELECT * FROM credentials WHERE email='$email'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run)) {
    echo "<script>alert('Account already exists')</script>";
    header("refresh:0;register_admin.php");
    exit();
}

// insert into credentials (usertype=3 for admin)
$registersql = "INSERT INTO credentials (email, password, usertype) 
                VALUES ('$email', '$password', 3)";
$registeruser = mysqli_query($conn, $registersql);

if (!$registeruser) {
    die("MySQL Error (credentials insert): " . mysqli_error($conn));
}

// get the last inserted ID from credentials
$credid = mysqli_insert_id($conn);

// insert into admins table
$userssql = "INSERT INTO admins (ad_name, adminno, cred_id) 
             VALUES ('$name', '$idNumber', $credid)";
$success = mysqli_query($conn, $userssql);

if (!$success) {
    die("MySQL Error (admins insert): " . mysqli_error($conn));
}

echo "<script>alert('Admin Registered Successfully!')</script>";
header('refresh:0;login_admin.php');
exit();
?>
