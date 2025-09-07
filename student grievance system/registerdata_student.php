<?php
session_start();
require_once "inc/conn.php";

$name      = $_POST["name"];
$email     = $_POST["emailAddress"];
$phonenum  = $_POST["phoneNumber"];
$idNumber  = $_POST["idNumber"];
$password  = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

// check password confirmation
if ($confirmPassword != $password) {
    echo '<script>alert("Password Not Same")</script>';
    header("refresh:0;url=register_student.php?error=password_mismatch");
    exit();
}

// check if email already exists
$sql = "SELECT * FROM credentials WHERE email='$email'";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run)) {
    echo "<script>alert('Account already exists')</script>";
    header("refresh:0;url=register_student.php");
    exit();
}

// insert into credentials (usertype=0 for student)
$registersql = "INSERT INTO credentials (email, password, usertype) 
                VALUES ('$email', '$password', 0)";
$registeruser = mysqli_query($conn, $registersql);

if (!$registeruser) {
    die("MySQL Error (credentials insert): " . mysqli_error($conn));
}

// get last inserted ID
$credid = mysqli_insert_id($conn);

// insert into users table
$userssql = "INSERT INTO users (user_name, studno, cred_id) 
             VALUES ('$name', '$idNumber', $credid)";
$success = mysqli_query($conn, $userssql);

if (!$success) {
    die("MySQL Error (users insert): " . mysqli_error($conn));
}

echo "<script>alert('Student Registered Successfully!')</script>";
header("refresh:0;url=login_student.php");
exit();
?>
