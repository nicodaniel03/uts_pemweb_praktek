<?php


include 'function.php';  

// Jika sudah login, langsung alihkan ke halaman pemesanan
if (isset($_SESSION['users'])) {
    header("Location: pemesanan.php");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($email) || empty($password)) {
        $error_message = "Email atau password tidak boleh kosong!";
    } else {
        // Query cek user di database
        $sql = "SELECT * FROM users WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            // Verifikasi password
            if (password_verify($password, $row['Password'])) {
                $_SESSION['users'] = $row['Email'];
                $_SESSION['userid'] = $row['ID'];

                // Arahkan ke halaman pemesanan
                header("Location: pemesanan.php");
                exit;
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Email tidak ditemukan!";
        }
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
         <form action="loginuser.php" method="POST">
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
                        <p>Don't have an account? <a href="#">Sign up</a></p>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>
