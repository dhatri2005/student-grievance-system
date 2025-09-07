<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="img/bg.png">
    <h1 class="text-center py-3 px-4" style="color: #000; text-align: left;">Student Grievance Portal</h1>

    <div class="text-center mt-3">
        <div class="mb-2">
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php'">Officer Login</button>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php'">Admin Login</button>    
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php'">Student Login</button>
        </div>
        
        <div>
            <button type="button" class="btn btn-success me-2" onclick="location.href='register.php'">Officer Register</button>
            <button type="button" class="btn btn-success me-2" onclick="location.href='register.php'">Admin Register</button>
            <button type="button" class="btn btn-success me-2" onclick="location.href='register.php'">Student Register</button>
        </div>

        <div>
            <button type="button" class="btn btn-success me-2" onclick="location.href='faq.php'">FAQ</button>
        </div>
    </div>
</body>
</html>
