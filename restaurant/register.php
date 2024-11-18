<?php
include 'function.php';

if (isset($_POST['regis'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];  
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $jk = $_POST['gender'];

    if (empty($username) || empty($email) || empty($password) || empty($phone) || empty($jk)) {
        echo "<script>alert('Semua kolom harus diisi!'); window.location.href = 'register.php';</script>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok!'); window.location.href = 'register.php';</script>";
        exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $role = 'pembeli';
    mysqli_stmt_bind_param($stmt, "sss", $email, $password, $role);
    $createduser = mysqli_stmt_execute($stmt);

    $stmtdata = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmtdata, "s", $email);
    mysqli_stmt_execute($stmtdata);
    $userdata = mysqli_fetch_assoc(mysqli_stmt_get_result($stmtdata));
    
    $stmt_data_pembeli = mysqli_prepare($conn, "INSERT INTO data_pembeli (id_user, nama_pembeli, no_telp, jenis_kelamin) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt_data_pembeli, "isss", $userdata['id_user'], $username, $phone, $jk); // Ubah "sss" menjadi "isss"
    $createddata = mysqli_stmt_execute($stmt_data_pembeli);

    if ($createduser && $createddata) {
        echo "<script>alert('Registrasi berhasil!'); window.location.href = 'login.php';</script>";
        exit;
    } else {
        echo "Gagal mendaftarkan pengguna: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmtdata);
    mysqli_stmt_close($stmt_data_pembeli);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<link rel="stylesheet" href="css/regis.css">
</head>
<body>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label for="phone">No. Telepon:</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,13}" title="Harap masukkan nomor telepon yang valid (10-13 digit)." placeholder="Contoh: 08123456789">

        <label for="jk">Jenis Kelamin:</label>
        <select id="jk" name="gender" class="jenis-kelamin" required>
        <option value="" selected disabled class="placeholder">Pilih Jenis Kelamin</option>
            <option value="laki_laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>

        <p class="error" id="error-message" style="display:none; color: red;"></p>

        <button type="submit" name="regis">Register</button>

        <p class="login-text">Have an account? <a href="login.php">Go to login</a></p>
    </form>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("confirm_password");
            const errorMessage = document.getElementById("error-message");
            
            form.addEventListener("submit", function (e) {
                // Cek apakah password dan konfirmasi password cocok
                if (passwordInput.value !== confirmPasswordInput.value) {
                    e.preventDefault(); // Mencegah form dari pengiriman jika tidak cocok
                    errorMessage.style.display = "block";
                    errorMessage.textContent = "Password dan konfirmasi password tidak cocok.";
                } else {
                    errorMessage.style.display = "none";
                }
            });
        });
    </script>

</body>
</html>

