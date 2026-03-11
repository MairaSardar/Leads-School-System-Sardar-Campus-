<?php
$title = "Student Login Account" ;
require_once 'Include/header.php';
require_once 'database/conn.php';

// Redirect to login if not logged in
if (!isset($_SESSION['student_cnic'])) {
    header("Location: login.php");
    exit;
}

// Fetch student data from database
$cnic = $_SESSION['student_cnic'];
$stmt = $pdo->prepare("SELECT * FROM student_logins WHERE cnic = ?");
$stmt->execute([$cnic]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "<script>alert('User not found.'); window.location='login.php';</script>";
    exit;
}

?>

    <style>
        .dashboard-container {
            max-width: 500px;
            margin: 40px auto;
            background: #fffbe9;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            border: 1.5px solid #f3e6c2;
        }
        .dashboard-container h2 {
            color: #ff7a00;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .dashboard-container table {
            width: 100%;
            font-size: 1.1rem;
        }
        .dashboard-container th, .dashboard-container td {
            padding: 8px 0;
            text-align: left;
        }
        .dashboard-container th {
            color: #1b2a4e;
            width: 40%;
        }
    </style>

<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    <table>
        <tr>
            <th>Name:</th>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
        </tr>
        <tr>
            <th>CNIC:</th>
            <td><?php echo htmlspecialchars($user['cnic']); ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
    </table>
    <div style="text-align:center; margin-top:2rem;">
        <a href="logout.php" style="color:#fff; background:#ff7a00; padding:10px 24px; border-radius:6px; text-decoration:none;">Logout</a>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="footer-bottom py-4">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <div class="footer-social mt-2">
      <a href="https://www.facebook.com/LeadsSchoolSystemPK/"><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/leadsschoolsystempk/?hl=en"><i class="bi bi-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCwP14LslY5RbEl7Z0eOCupw"><i class="bi bi-youtube"></i></a>
    </div>
    <div>
      <span id="footerYear"></span> Leads School System. All Rights Reserved.
    </div>
    <div>
      <img src="School images/footer logo1.png" alt="Leads School" height="60" >
    </div>
  </div>
</div>
<script>
  document.getElementById('footerYear').textContent = new Date().getFullYear();
</script>