<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="img/loginbg.png">
    <h2 class="py-5 px-5" style="color: #000; margin-left: 170px; margin-top: 10px">Student Login</h2>

    <div class="container px-5 my-5">
        <form action="logindata_student.php" method="POST">
            <div class="form-floating mb-3">
                <input class="form-control" name="emailAddress" type="email" placeholder="Email" required style="width: 250px;" />
                <label for="emailAddress">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="password" type="password" placeholder="Password" required style="width: 250px;" />
                <label for="password">Password</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit" style="width: 150px; margin-left: 50px;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
