<?php  
session_start();
include("inc/conn.php");  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $email = $_POST['emailAddress'];  
    $password = $_POST['password'];  

    // check credentials (usertype=0 for student)
    $sql = "SELECT * FROM credentials WHERE email='$email' AND password='$password' AND usertype=0";  
    $run = mysqli_query($conn, $sql);  

    if (mysqli_num_rows($run)) {
        $_SESSION['email'] = $email;
        $resUser = mysqli_fetch_array($run);
        $credId  = $resUser['cred_id'];

        // fetch student details
        $sql = "SELECT * FROM users WHERE cred_id='$credId'";
        $run = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($run);

        $_SESSION['userid'] = $result['user_id']; // safer with column name
        $_SESSION['student'] = true; 

        header('refresh:0;user/index.php');
        exit();
    } else {  
        echo "<script>alert('Invalid Student login')</script>";
        header('refresh:0;login_student.php');
        exit();
    }  
}
?>
