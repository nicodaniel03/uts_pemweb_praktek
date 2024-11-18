
<?php
require 'function.php';

if(isset($_SESSION['error_message'])){ 
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
} else {
    $error_message = '';
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {

            $_SESSION['users'] = $row['email'];
            $_SESSION['userid'] = $row['id_user'];
            $_SESSION['role'] = $row['role'];

            if ($_SESSION['role'] == 'admin'){
                header('location: index.php');
            }
            else{
                header("Location: pemesanan.php");
            }
            exit;
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Email tidak ditemukan!";
    }

}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin'){
        header('location: index.php');
    }
    else{
        header("Location: pemesanan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login user</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
         <form action="login.php" method="POST">
                <h2>Login</h2>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Enter your password">
                    </div>
                    <div class="error-message"><?= $error_message ?></div>
                        <button type="submit" class="login-button" name="login">Login</button>
                    <div class="footer">
                        <p>Don't have an account? <a href="register.php">Sign up</a></p>
                    </div>
            </form>
        </div>
    </div>
</body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('error-message');
            
            if (errorMessage) {
                console.log("Error message element found");
            } else {
                console.log("Error message element NOT found");
            }

            const emailInput = document.getElementById('inputEmail');
            const passwordInput = document.getElementById('inputPassword');

            if (emailInput) {
                emailInput.addEventListener('click', function() {
                    console.log("Email field clicked");
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                });
            } else {
                console.log("Email input NOT found");
            }

            if (passwordInput) {
                passwordInput.addEventListener('click', function() {
                    console.log("Password field clicked");
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                });
            } else {
                console.log("Password input NOT found");
            }
        });
    </script>
</body>
</html>
