<?php
session_start();
require_once "inc/conn.php";

$name      = $_POST["name"];
$email     = $_POST["emailAddress"];
$phonenum  = $_POST["phoneNumber"];
$idNumber  = $_POST["idNumber"];
$password  = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

// Debug: print values (you can remove later)
echo "Debug - Name: $name, Email: $email, Phone: $phonenum, ID: $idNumber<br>";

if ($confirmPassword != $password) {
    echo '<script>alert("Password Not Same")</script>';
    header("refresh:0;url=register_officer.php?error=password_mismatch");
    exit();
}

// check if email already exists
$sql = "SELECT * FROM credentials WHERE email='$email'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run)) {
    echo "<script type=\"text/javascript\">alert('Account already exists')</script>";
    header('refresh:0;register_officer.php');
    exit();
}

// insert into credentials (usertype=2 for officer)
$registersql = "INSERT INTO credentials (email, password, usertype) 
                VALUES ('$email', '$password', 2)";
$registeruser = mysqli_query($conn, $registersql);

if (!$registeruser) {
    die("MySQL Error (credentials insert): " . mysqli_error($conn));
}

// get the last inserted ID from credentials
$credid = mysqli_insert_id($conn);

// insert into officers table
$userssql = "INSERT INTO officers (off_name, offno, cred_id) 
             VALUES ('$name', '$idNumber', $credid)";
$succesuser = mysqli_query($conn, $userssql);

if (!$succesuser) {
    die("MySQL Error (officers insert): " . mysqli_error($conn));
}

echo "<script>alert('Officer Registered Successfully!')</script>";
header('refresh:0;login_officer.php');
exit();
?>
