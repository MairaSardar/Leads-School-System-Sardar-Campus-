<?php
$title="Contact Us";
require_once 'Include/header.php';
require_once 'database/conn.php';

// Initialize variables
$nameErr = $emailErr = $subjectErr = $formMsg = '';
$nameVal = $emailVal = $subjectVal = $messageVal = '';
$nameInvalid = $emailInvalid = $subjectInvalid = '';

if(isset($_POST['send_message'])){
  $nameVal = trim($_POST['name']);
  $emailVal = trim($_POST['email']);
  $subjectVal = trim($_POST['subject']);
  $messageVal = $_POST['message'];

  $valid = true;

  // Name validation
  if(!preg_match('/^[A-Za-z\s]+$/', $nameVal)){
    $nameErr = "Name must contain alphabets only.";
    $nameInvalid = 'is-invalid';
    $valid = false;
  }

  // Subject validation
  if(!preg_match('/^[A-Za-z\s]+$/', $subjectVal)){
    $subjectErr = "Subject must contain alphabets only.";
    $subjectInvalid = 'is-invalid';
    $valid = false;
  }

  // Email validation
  if(!filter_var($emailVal, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Please enter a valid email address.";
    $emailInvalid = 'is-invalid';
    $valid = false;
  } else {
    // Check if email exists in database
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM contacts WHERE email = ?");
    $stmt->execute([$emailVal]);
    if($stmt->fetchColumn() > 0){
      $emailErr = "This email is already used. Please use a different email.";
      $emailInvalid = 'is-invalid';
      $valid = false;
    }
  }

  if($valid){
  $r = $crud->insertContact($nameVal, $emailVal, $subjectVal, $messageVal);
  if($r){
    // Set a session variable for the thank you message
    session_start();
    $_SESSION['formMsg'] = "<div class='alert alert-success mt-2'>Thank you for contacting us!</div>";
    header("Location: contact.php");
    exit();
  } else {
    $formMsg = "<div class='alert alert-danger mt-2'>TRY AGAIN!</div>";
  }
}
}
?>

<div class="background-container">
  <div class="form-wrapper">
    <h2>Contact Us</h2>
    <form id="contactForm" action="./contact.php" method="POST" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Your Name *</label>
        <input type="text" class="form-control <?php echo $nameInvalid; ?>" id="name" name="name" required pattern="^[A-Za-z\s]+$" value="<?php echo htmlspecialchars($nameVal); ?>" />
        <div class="invalid-feedback"><?php echo $nameErr ?: "Please enter your name (Characters only)."; ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control <?php echo $emailInvalid; ?>" id="email" name="email" required value="<?php echo htmlspecialchars($emailVal); ?>" />
        <div class="invalid-feedback"><?php echo $emailErr ?: "Please enter a valid email address."; ?></div>
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">Subject *</label>
        <input type="text" class="form-control <?php echo $subjectInvalid; ?>" id="subject" name="subject" required pattern="^[A-Za-z\s]+$" value="<?php echo htmlspecialchars($subjectVal); ?>" />
        <div class="invalid-feedback"><?php echo $subjectErr ?: "Please enter a subject (Characters only)."; ?></div>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Your Message *</label>
        <textarea class="form-control" id="message" name="message" rows="5" required><?php echo htmlspecialchars($messageVal); ?></textarea>
        <div class="invalid-feedback">Please enter your message.</div>
      </div>
      <button type="submit" class="btn btn-warning w-100" name="send_message">Send Message</button>
      <div id="msg"><?php echo $formMsg; ?></div>
    </form>
  </div>
</div>

<script>
(function () {
  'use strict';
  const form = document.getElementById('contactForm');
  form.addEventListener('submit', function (event) {
    // Custom JS validation for alphabets only
    const name = document.getElementById('name');
    const subject = document.getElementById('subject');
    const alphaRegex = /^[A-Za-z\s]+$/;
    let valid = true;
    if (!alphaRegex.test(name.value)) {
      name.classList.add('is-invalid');
      valid = false;
    } else {
      name.classList.remove('is-invalid');
    }
    if (!alphaRegex.test(subject.value)) {
      subject.classList.add('is-invalid');
      valid = false;
    } else {
      subject.classList.remove('is-invalid');
    }
    if (!form.checkValidity() || !valid) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
})();
</script>


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

