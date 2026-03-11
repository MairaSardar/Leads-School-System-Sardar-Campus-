<?php
$title = "Student Login";
require_once 'Include/header.php';
require_once 'database/conn.php'; 
require_once 'database/crud.php'; 

$crud = new crud($pdo);

// Handle login POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $cnic = trim($_POST['cnic']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // 1. Check if student exists in admissions table
    $stmt = $pdo->prepare("SELECT * FROM admissions WHERE name = ? AND cnic = ? AND email = ?");
    $stmt->execute([$name, $cnic, $email]);
    $admission = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admission) {
        // 2. Check if already registered in login table
        $stmt2 = $pdo->prepare("SELECT * FROM student_logins WHERE cnic = ?");
        $stmt2->execute([$cnic]);
        $login = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($login) {
            // 3. Authenticate password
            if (password_verify($password, $login['password'])) {
                $_SESSION['student_cnic'] = $login['cnic'];
                echo "<script>alert('Login successful!'); window.location='dashboard.php';</script>";
                exit;
            } else {
                echo "<script>alert('Incorrect password.'); window.history.back();</script>";
                exit;
            }
        } else {
            // 4. Register in login table (first time login)
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt3 = $pdo->prepare("INSERT INTO student_logins (name, cnic, email, password) VALUES (?, ?, ?, ?)");
            $stmt3->execute([$name, $cnic, $email, $hashed]);
            $_SESSION['student_cnic'] = $cnic;
            echo "<script>alert('Account created and logged in!'); window.location='dashboard.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('No admission record found. Please register first.'); window.location='admission.php';</script>";
        exit;
    }
}
?>

<style>
:root {
  --login-bg-image: url('School images/bag4.jpg');
}
.login-background {
  min-height: 100vh;
  background-image: var(--login-bg-image);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 3vw 8vw;
}
.login-wrapper {
  background: #fff;
  border-radius: 18px;  
  padding: 2.5rem 2rem 2rem 2rem;
  max-width: 500px;
  width: 100%;
  margin-left: 0;      
  margin-right: 2vw;   
  box-shadow: 0 6px 32px rgba(0,0,0,0.10), 0 1.5px 8px rgba(255,122,0,0.07);
  border: 1.5px solid #f3e6c2;
  position: relative;
}
#loginForm .form-group {
  display: flex;
  flex-direction: column;
  gap: 7px;
  margin-bottom: 18px;
}
#loginForm label {
  font-weight: 500;
  color: #1b2a4e;
  margin-bottom: 4px;
}
#loginForm input {
  width: 100%;
  box-sizing: border-box;
  padding: 10px 14px;
  border: 1.5px solid #ff7a00;
  border-radius: 7px;
  background: #fffbe9;
  font-size: 1.05rem;
  transition: border-color 0.2s, box-shadow 0.2s;
}
#loginForm input:focus {
  border-color: #1b2a4e;
  background: #fff7e0;
  outline: none;
  box-shadow: 0 0 0 2px #ffecd2;
}
#loginForm .btn {
  min-width: 180px;
  padding: 12px 0;
  font-size: 1.15rem;
  font-weight: 600;
  border-radius: 8px;
  background: linear-gradient(90deg, #ff7a00 60%,rgb(220, 123, 19) 100%);
  border: none;
  color: #fff;
  box-shadow: 0 2px 8px rgba(255, 122, 0, 0.08);
  transition: background 0.2s;
  margin-top: 10px;
  display: block;
}
#loginForm .btn:hover {
  background: linear-gradient(90deg, #ffb347 0%, #ff7a00 100%);
  color: #fff;
}
@media (max-width: 600px) {
  .login-background {
    padding: 2rem 0.5rem;
    justify-content: center;
  }
  .login-wrapper {
    padding: 1.5rem 0.5rem;
    max-width: 99vw;
    margin-right: 0;
    margin-left: 0;
  }
}

</style>
<div class="login-background">
  <div class="login-wrapper">
    <h2 style="text-align:center; color:rgb(224, 101, 29);">Student Login</h2>
    <form id="loginForm" action="login.php" method="POST" novalidate>
      <div class="form-group">
        <label for="name">Name <span class="text-danger">*</span>:</label>
        <input type="text" id="name" name="name" required minlength="3" />
      </div>
      <div class="form-group">
        <label for="cnic">CNIC <span class="text-danger">*</span>:</label>
        <input type="text" id="cnic" name="cnic" required pattern="^\d{12}$" maxlength="12" minlength="12" placeholder="Enter 12 digit CNIC" />
      </div>
      <div class="form-group">
        <label for="email">Email <span class="text-danger">*</span>:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span>:</label>
        <input type="password" id="password" name="password" required minlength="6" maxlength="32" autocomplete="off" />
      </div>
      <div style="display:flex;justify-content:center;">
        <button type="submit" class="btn btn-warning">Login</button>
      </div>
      <p class="mt-3 text-center">
        Not registered? <a href="admission.php">Register here</a>
      </p>
      <!-- Forgot Password Link -->
      <p class="mt-3 text-center">
        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
      </p>
    </form>
  </div>
</div>

<!-- Forgot Password Modal (moved outside .login-wrapper and .login-background) -->
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="forget_password.php" id="forgotForm">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotModalLabel">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="forgot_email">Enter your registered Email:</label>
          <input type="email" class="form-control" id="forgot_email" name="email" required>
        </div>
        <div class="form-group mb-3">
          <label for="forgot_cnic">Enter your CNIC:</label>
          <input type="text" class="form-control" id="forgot_cnic" name="cnic" required pattern="^\d{12}$" maxlength="12" minlength="12">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Send Reset Link</button>
      </div>
    </form>
  </div>
</div>

</div>
<script>
(() => {
  'use strict';
  const form = document.getElementById('loginForm');
  form.addEventListener('submit', (event) => {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      alert('Please fill out all required fields correctly.');
    }
    form.classList.add('was-validated');
  });

  // CNIC validation for forgot password modal
const forgotCnic = document.getElementById('forgot_cnic');
if (forgotCnic) {
  forgotCnic.addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 12);
  });
}

  const cnicInput = document.getElementById('cnic');
  if (cnicInput) {
    cnicInput.addEventListener('input', function() {
      this.value = this.value.replace(/\D/g, '').slice(0, 12); // Only digits, max 12
    });
  }
})(); 
</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  document.getElementById('footerYear').textContent = new Date().getFullYear();
</script>
</div>
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
