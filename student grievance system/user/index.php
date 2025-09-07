<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../img/loginbg.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .center-box {
            background-color: rgba(255,255,255,0.9);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            margin: auto;
            margin-top: 10%;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        .btn-custom {
            width: 200px;
            margin: 10px auto;
        }
    </style>
</head>
<body>

<div class="center-box">
    <h1>Welcome Student to Complaint System</h1>

    <?php if (isset($_SESSION['userid'])): ?>
        <!-- Show these only if logged in -->
        <button class="btn btn-primary btn-custom" onclick="location.href='view.php'">
            View Complaints
        </button>

        <button class="btn btn-warning btn-custom" onclick="location.href='complaint.php'">
            Make Complaint
        </button>

        

    <?php else: ?>
        <!-- Show these only if not logged in -->
        <button class="btn btn-success btn-custom" onclick="location.href='../login.php'">
            Login
        </button>

        <button class="btn btn-secondary btn-custom" onclick="location.href='../signup.php'">
            Sign Up
        </button>
    <?php endif; ?>
</div>

</body>
</html>
