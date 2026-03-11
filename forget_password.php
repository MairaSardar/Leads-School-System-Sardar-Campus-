<?php
require_once 'database/conn.php';
require_once 'Include/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $cnic = trim($_POST['cnic']);

    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM student_logins WHERE email = ? AND cnic = ?");
    $stmt->execute([$email, $cnic]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate token
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Save token to DB (add columns if needed)
        $stmt2 = $pdo->prepare("UPDATE student_logins SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt2->execute([$token, $expires, $email]);

        // Send email (use PHPMailer for production)
        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
        mail($email, "Password Reset", "Click to reset: $resetLink");

        echo "<script>alert('Reset link sent to your email.'); window.location='login.php';</script>";
        exit;
    } else {
        echo "<script>alert('No account found with provided details.'); window.location='login.php';</script>";
        exit;
    }
}
?>