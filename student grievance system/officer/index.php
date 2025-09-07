<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Officer Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('comp.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            margin: auto;
            margin-top: 10%;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        .btn-custom {
            width: 200px;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <?php /*include "../inc/header.php";*/ ?>

    <div class="overlay text-center">
        <h1 class="mb-4">Welcome Officer to Student Complaint System!</h1>

        <?php if (isset($_SESSION['officerid'])): ?>
            <!-- Show only if officer is logged in -->
            <button class="btn btn-primary btn-custom" onclick="location.href='viewcomplaint.php'">
                View Complaints
            </button>

            

        <?php else: ?>
            <!-- Show if not logged in -->
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
