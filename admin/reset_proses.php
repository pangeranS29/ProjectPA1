<?php
// reset_proses.php

session_start();
include 'config.php';

$email = $_SESSION['reset_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the new password and confirm password fields are filled
    if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if the new password and confirm password match
        if ($newPassword === $confirmPassword) {
            // Assuming you have retrieved the email from somewhere
            // Replace 'user_email' with the actual variable or value
            $email = $_SESSION['reset_email'];

            // Update the password in the users table
            $query = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "Password updated successfully.<br>";
                unset($_SESSION['reset_email']);
                unset($_SESSION['otp']);
                unset($_SESSION['ganti_password']);
                $_SESSION['gantipw'] = true;
                header('Location:login_admin.php');
                exit;

            } else {
                echo "Error updating password: " . mysqli_error($con);
            }
        } else {
            $_SESSION['konfirsalah'] = true;
            header('Location:reset_password.php');
            exit;
        }
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>
