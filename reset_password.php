<?php
require_once 'database/conn.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if token is valid and not expired
    $stmt = $pdo->prepare("SELECT * FROM student_logins WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "<script>alert('Invalid or expired reset link.'); window.location='login.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No reset token provided.'); window.location='login.php';</script>";
    exit;
}

// Handle password reset form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
    $password = trim($_POST['password']);
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Update password and clear token
    $stmt = $pdo->prepare("UPDATE student_logins SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
    $stmt->execute([$hashed, $token]);

    echo "<script>alert('Password reset successful! Please login.'); window.location='login.php';</script>";
    exit;
}
?>

<div class="container mt-5">
    <h2>Reset Your Password</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6" maxlength="32">
        </div>
        <button type="submit" class="btn btn-warning">Reset Password</button>
    </form>
</div>
