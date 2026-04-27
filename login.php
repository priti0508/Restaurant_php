<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    if($user && password_verify($pass,$user['password'])){
        $_SESSION['id'] = $user['id'];
        header("Location: home.php");
    } else {
        echo "<div class='alert alert-danger text-center m-0' role='alert'>Invalid Login</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #eef2f3, #8e9eab);
           
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            border: none;
            width: 100%;
            max-width: 400px; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex justify-content-center">
            
            <div class="card p-4">
                <h3 class="text-center mb-4 fw-bold"> Login</h3>
                
                <form method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="d-grid mt-4">
                        <button type="submit" name="login" class="btn btn-primary btn-lg fw-bold">Login</button>
                    </div>
                    
                </form>
                <div class="text-center mt-3 pt-3 border-top">
                    <p class="mb-0">Don't have account <br>
                    <a href="register.php" class="btn btn-outline-dark btn-sm mt-2 fw-bold"> Register Here</a>
                    </p>
                </div>
                
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>