<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Officer Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="img/reg.jpg">
    <?php include "inc/header.php" ?>
    <h2 class="py-3 px-5" style="margin-left: 200px;">Officer Register</h2>

    <div class="container px-5 my-5">
        <form action="registerdata_officer.php" method="POST">
            <div class="form-floating mb-3">
                <input class="form-control" name="name" type="text" placeholder="Name" required style="width: 350px;" />
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="emailAddress" type="email" placeholder="Email Address" required style="width: 350px;" />
                <label for="emailAddress">Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="phoneNumber" type="number" placeholder="Phone Number" required style="width: 350px;" />
                <label for="phoneNumber">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="idNumber" type="number" placeholder="Officer ID" required style="width: 350px;" />
                <label for="idNumber">Officer ID</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="password" type="password" placeholder="Password" required style="width: 350px;" />
                <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="confirmPassword" type="password" placeholder="Confirm Password" required style="width: 350px;" />
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit" style="width: 150px; margin-left: 100px;">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
