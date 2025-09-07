<?php  
session_start();
include("inc/conn.php");  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $email = $_POST['emailAddress'];  
    $password = $_POST['password'];  

    // check credentials (usertype=3 for admin)
    $sql = "SELECT * FROM credentials WHERE email='$email' AND password='$password' AND usertype=3";  
    $run = mysqli_query($conn, $sql);  

    if (mysqli_num_rows($run)) {
        $_SESSION['email'] = $email;
        $resUser = mysqli_fetch_array($run);
        $credId  = $resUser['cred_id'];

        // fetch admin details
        $sql = "SELECT * FROM admins WHERE cred_id='$credId'";
        $run = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($run);

        $_SESSION['adminid'] = $result['admin_id']; // safer to use column name
        $_SESSION['admin']   = true; 

        header('refresh:0;admin/index.php');
        exit();
    } else {  
        echo "<script>alert('Invalid Admin login')</script>";
        header('refresh:0;login_admin.php');
        exit();
    }  
}
?>
