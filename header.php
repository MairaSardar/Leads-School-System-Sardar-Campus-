<html lang="en">
<head>
  <meta charset="UTF-8">
   <title>Leads School-<?php echo $title?></title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="styling.css" rel="stylesheet">
</head>
<body>
  <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
  
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="School images/footer logo1.png" alt="Logo" height="60" class="me-2">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fw-bold" id="mainNavbar">
     
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item"><a class="nav-link <?php if($title=='Home') echo 'active'; ?>" href="Home.php">HOME</a></li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php if($title=='ADMISSION' || $title=='NEWS & EVENTS' || (isset($_SESSION['student_cnic']) && $title=='Dashboard')) echo 'active'; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      ACADAMICS
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item <?php if($title=='ADMISSION') echo 'active'; ?>" href="admission.php">ADMISSION</a></li>
      <li><a class="dropdown-item <?php if($title=='NEWS & EVENTS') echo 'active'; ?>" href="Newsevents.php">NEWS & EVENTS</a></li>
      <?php if (isset($_SESSION['student_cnic'])): ?>
        <li><a class="dropdown-item <?php if($title=='Dashboard') echo 'active'; ?>" href="dashboard.php">Dashboard</a></li>
      <?php endif; ?>
    </ul>
  </li>
  <li class="nav-item"><a class="nav-link <?php if($title=='E LEARNING') echo 'active'; ?>" href="elearn.php">E LEARNING</a></li>
  <li class="nav-item"><a class="nav-link <?php if($title=='ABOUT US') echo 'active'; ?>" href="about.php">ABOUT US</a></li>
  <li class="nav-item"><a class="nav-link <?php if($title=='CONTACT US') echo 'active'; ?>" href="contact.php">CONTACT US</a></li>
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php if(in_array($title, ['Admin Admission','Admin Login','Admin Contact'])) echo 'active'; ?>" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      ADMIN
    </a>
    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
      <li><a class="dropdown-item <?php if($title=='Admin Admission') echo 'active'; ?>" href="admin_admission.php">Admin Admission</a></li>
      <li><a class="dropdown-item <?php if($title=='Admin Login') echo 'active'; ?>" href="admin_login.php">Admin Login</a></li>
      <li><a class="dropdown-item <?php if($title=='Admin Contact') echo 'active'; ?>" href="admin_contact.php">Admin Contact</a></li>
    </ul>
  </li>
 
  <?php if (isset($_SESSION['student_cnic'])): ?>
    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
  <?php else: ?>
    <li class="nav-item"><a class="nav-link <?php if($title=='Login') echo 'active'; ?>" href="login.php">Login</a></li>
  <?php endif; ?>
</ul>
      </div>
    </div>
  </nav>

  