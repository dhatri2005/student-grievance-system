<?php  
session_start();
include("inc/conn.php");  

if($_SERVER["REQUEST_METHOD"] == "POST") {  
    $email = $_POST['emailAddress'];  
    $password = $_POST['password'];  

    $sql="SELECT * FROM credentials WHERE email='$email' AND password='$password' AND usertype=2";  
    $run = mysqli_query($conn,$sql);  

    if(mysqli_num_rows($run)) {
        $_SESSION['email']=$email;
        $resUser = mysqli_fetch_array($run);
        $credId = $resUser['cred_id'];

        // fetch officer details
        $sql="SELECT * FROM officers WHERE cred_id='$credId'";
        $run=mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($run);
        $_SESSION['officerid']=$result['officer_id'];

        header('refresh:0;officer/index.php');
    } else {  
        echo "<script>alert('Invalid Officer login')</script>";
        header('refresh:0;login_officer.php');
        die();
    }  
}
?>  
