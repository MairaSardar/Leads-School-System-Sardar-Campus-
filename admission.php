<?php
$title="Admission Form";
require_once 'Include/header.php';
require_once 'database/crud.php';
require_once 'database/conn.php';

$crud = new crud($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $grade = $_POST['grade'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $previousSchool = $_POST['previousSchool'];
    $previouslyApplied = $_POST['previouslyApplied'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];

    $result = $crud->insertAdmission($name, $fatherName, $gender, $age, $birthday, $grade, $religion, $nationality, $address, $contactNumber, $previousSchool, $previouslyApplied, $email, $cnic);

    if ($result === true) {
        echo "<script>alert('Registration successful!'); window.location='admission.php';</script>";
    } elseif ($result === "duplicate") {
        echo "<script>alert('This CNIC is already registered.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Error: Could not save data.'); window.history.back();</script>";
    }
}
?>

<style>
:root {
  --form-bg-image: url('School images/back11.jpg');
}
.background-container {
  min-height: 100vh;
  background-image: var(--form-bg-image);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 3vw 1vw; 
}
.form-wrapper, .registration-wrapper {
  background: #fff;
  border-radius: 18px;
  padding: 2.5rem 2rem 2rem 2rem;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  box-shadow: 0 6px 32px rgba(0,0,0,0.10), 0 1.5px 8px rgba(255,122,0,0.07);
  border: 1.5px solid #f3e6c2;
  position: relative;
}
#registrationForm .flex {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px 18px;
  margin-bottom: 18px;
  align-items: end;
}
#registrationForm .flex.flex-3 {
  grid-template-columns: 1fr 1fr 1fr;
  gap: 24px 18px;
}
#registrationForm .form-group {
  display: flex;
  flex-direction: column;
  gap: 7px;
}
#registrationForm label {
  font-weight: 500;
  color: #1b2a4e;
  margin-bottom: 4px;
}
#registrationForm input,
#registrationForm select {
  width: 100%;
  box-sizing: border-box;
  padding: 10px 14px;
  border: 1.5px solid #ff7a00;
  border-radius: 7px;
  background: #fffbe9;
  font-size: 1.05rem;
  transition: border-color 0.2s, box-shadow 0.2s;
}
#registrationForm input:focus,
#registrationForm select:focus {
  border-color: #1b2a4e;
  background: #fff7e0;
  outline: none;
  box-shadow: 0 0 0 2px #ffecd2;
}
#registrationForm input[type="radio"] {
  width: 18px;
  height: 18px;
  accent-color: #ff7a00;
  margin-right: 7px;
  vertical-align: middle;
}
#registrationForm .form-check-group {
  display: flex;
  align-items: center;
  gap: 18px;
  margin-top: 2px;
}
#registrationForm .form-check-group label {
  display: flex;
  align-items: center;
  font-weight: 400;
  color: #222;
  margin-bottom: 0;
  font-size: 1rem;
  cursor: pointer;
}
#registrationForm .btn {
  min-width: 350px;   
  max-width: 220px;
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
#registrationForm .btn:hover {
  background: linear-gradient(90deg, #ffb347 0%, #ff7a00 100%);
  color: #fff;
}
@media (max-width: 900px) {
  #registrationForm .flex,
  #registrationForm .flex.flex-3 {
    grid-template-columns: 1fr;
  }
  .background-container {
    padding: 2rem 0.5rem;
    justify-content: center;
  }
  .form-wrapper, .registration-wrapper {
    padding: 1.5rem 0.5rem;
    max-width: 99vw;
  }
}
.submit-btn-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 18px;
}
</style>

<div class="background-container">
  <div class="form-wrapper registration-wrapper">
    <h1 style="text-align:center; color:rgb(233, 127, 20);">Registration Form</h1>
    <form id="registrationForm" action="./admission.php" method="POST" novalidate>
      <!-- Name & Father Name -->
      <div class="flex">
        <div class="form-group">
          <label for="name">Name <span class="text-danger">*</span>:</label>
          <input type="text" id="name" name="name" required minlength="3" />
        </div>
        <div class="form-group">
          <label for="fatherName">Father Name <span class="text-danger">*</span>:</label>
          <input type="text" id="fatherName" name="fatherName" required minlength="3" />
        </div>
      </div>
      <!-- CNIC & Email -->
      <div class="flex">
        <div class="form-group">
          <label for="cnic">CNIC <span class="text-danger">*</span>:</label>
          <input type="text" id="cnic" name="cnic" required pattern="^\d{12}$" maxlength="12" minlength="12" placeholder="Enter 12 digit CNIC" />
        </div>
        <div class="form-group">
          <label for="email">Email <span class="text-danger">*</span>:</label>
          <input type="email" id="email" name="email" required />
        </div>
      </div>
      <!-- Gender, Age, Birthday -->
      <div class="flex flex-3">
        <div class="form-group">
          <label>Gender <span class="text-danger">*</span>:</label>
          <div class="form-check-group">
            <label><input type="radio" name="gender" value="Male" required /> Male</label>
            <label><input type="radio" name="gender" value="Female" /> Female</label>
          </div>
        </div>
        <div class="form-group">
          <label for="age">Age <span class="text-danger">*</span>:</label>
          <input type="number" id="age" name="age" min="3" max="25" required />
        </div>
        <div class="form-group">
          <label for="birthday">Birthday <span class="text-danger">*</span>:</label>
          <input type="date" id="birthday" name="birthday" required />
        </div>
      </div>
      <!-- Grade & Religion -->
      <div class="flex">
        <div class="form-group">
          <label for="grade">Grade <span class="text-danger">*</span>:</label>
          <select id="grade" name="grade" required>
            <option value="">Select Grade</option>
            <option value="Play Group">Play Group</option>
            <option value="Nursery">Nursery</option>
            <option value="Prep">Prep</option>
            <option value="1">1st Grade</option>
            <option value="2">2nd Grade</option>
            <option value="3">3rd Grade</option>
            <option value="4">4th Grade</option>
            <option value="5">5th Grade</option>
            <option value="6">6th Grade</option>
            <option value="7">7th Grade</option>
            <option value="8">8th Grade</option>
            <option value="9">9th Grade</option>
            <option value="10">10th Grade</option>
          </select>
        </div>
        <div class="form-group">
          <label for="religion">Religion <span class="text-danger">*</span>:</label>
          <select id="religion" name="religion" required>
            <option value="">Select Religion</option>
            <option value="Islam">Islam</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
      <!-- Nationality & Address -->
      <div class="flex">
        <div class="form-group">
          <label for="nationality">Nationality <span class="text-danger">*</span>:</label>
          <select id="nationality" name="nationality" required>
            <option value="">Select Nationality</option>
            <option value="Pakistani">Pakistani</option>
            <option value="American">American</option>
            <option value="British">British</option>
            <option value="Canadian">Canadian</option>
            <option value="Indian">Indian</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address">Address <span class="text-danger">*</span>:</label>
          <input type="text" id="address" name="address" required minlength="5" />
        </div>
      </div>
      <!-- Contact Number & Previous School -->
      <div class="flex">
        <div class="form-group">
          <label for="contactNumber">Contact Number <span class="text-danger">*</span>:</label>
          <input type="tel" id="contactNumber" name="contactNumber" pattern="^\+?[0-9\s\-]{7,15}$" required placeholder="+92 300 1234567" />
        </div>
        <div class="form-group">
          <label for="previousSchool">Previous School Information:</label>
          <input type="text" id="previousSchool" name="previousSchool" placeholder="If applicable" />
        </div>
      </div>
      <!-- Previously Applied -->
<div class="flex">
  <div class="form-group">
    <label>Have you previously applied to this school? <span class="text-danger">*</span>:</label>
    <div class="form-check-group">
      <label><input type="radio" name="previouslyApplied" value="Yes" required /> Yes</label>
      <label><input type="radio" name="previouslyApplied" value="No" /> No</label>
    </div>
  </div>
  <div></div>
</div>
      <!-- Submit Button -->
<div class="submit-btn-wrapper">
  <button type="submit" class="btn btn-warning">Submit</button>
</div>
<p class="mt-3 text-center">
  Not registered? <a href="admission.php">Register here</a>
</p>
    </form>
  </div>
</div>

<script>
  (() => {
    'use strict';
    const form = document.getElementById('registrationForm');
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        alert('Please fill out all required fields correctly.');
      }
      form.classList.add('was-validated');
    });
  })();

  const cnicInput = document.getElementById('cnic');
  if (cnicInput) {
    cnicInput.addEventListener('input', function() {
      this.value = this.value.replace(/\D/g, '').slice(0, 12); // Only digits, max 12
    });
  }
</script>

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