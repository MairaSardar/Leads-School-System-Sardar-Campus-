<?php 
$title="Home";
require_once 'Include/header.php';
?>
  <section class="cover-carousel position-relative">
    <div id="coverCarousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="2000">
      <div class="carousel-inner">
        
      <div class="carousel-item active ">
          <img src="School images/cppp1.png" class="d-block w-100" alt="Cover 1">
        </div>
       
        <div class="carousel-item ">
          <img src="School images/std3.jpg" class="d-block w-100" alt="Cover 2">
        </div>
        
        <div class="carousel-item ">
          <img src="School images/std5.jpg" class="d-block w-100" alt="Cover 3">
        </div>
       
        <div class="carousel-item ">
          <img src="School images/std4.jpg" class="d-block w-100" alt="Cover 4">
        </div>
        
        <div class="carousel-item ">
          <img src="School images/std6.jpg" class="d-block w-100" alt="Cover 5">
        </div>
      </div>

      <
      <div class="cover-caption">
        <h1>Leads School System</h1>
        <p >A Legacy of Learning, A Future of Leadership</p>
        <a href="admission.php" class="btn btn-light text-warning fw-bold">Admission</a>
        <a href="about.php" class="btn btn-dark fw-bold">About</a>
      </div>
    </div>
  </section>
  <section class="leads-orientation-section">
  <h1 class="leads-title">Life at LEADS</h1>
  <div class="orientation-wrapper">
    <div class="orientation-content">
      <h2>Leads Group Orientation 2025</h2>
      <p>
        A Day of Connection and Shared Purpose On February 1st, 2025, Leads Group Head Office proudly hosted its annual Orientation Session, bringing together a vibrant community of educators and professionals from across Pakistan. The day was a dynamic blend of insightful presentations, captivating performances, and collaborative discussions, all aimed at strengthening the Leads vision and fostering a spirit of unity.
      </p>
    </div>
    <div class="orientation-video">
      <video 
        src="School images/Orientation-Highlights.mp4" 
        autoplay 
        muted 
        loop 
        controls 
        controlsList="nodownload nofullscreen noremoteplayback"
        width="400"
        id="orientationVideo"
        style="background:#000; border-radius:10px;"
      ></video>
    </div>
  </div>
</section>
<div class="split-section">
    <div class="split-half left-half">
      <h2>Become A Franchise</h2>
      <p>
        Join LEADS as a Franchise and become a part of rapidly growing network, where possibilities are infinite.
        Hence, on the basis of our competitive advantages, we invited you to get LEADS Franchise and become leads in education sector.
      </p>
    </div>
    <div class="split-half right-half">
      <h2>Admission Open 2025</h2>
      <p>
        Admission is open to students who wish to peruse their school studies in a save and caring learning environment.
        Written test and interviews are taken according to the Grade levels.
      </p>
    </div>
  </div>

  <section class="leads-stats-section">
  <div class="leads-stats-wrapper">
    <div class="leads-stat">
      <span class="stat-number stat-blue">220+</span>
      <span class="stat-label">Campuses</span>
    </div>
    <div class="leads-stat">
      <span class="stat-number stat-orange">3,500+</span>
      <span class="stat-label">Teachers</span>
    </div>
    <div class="leads-stat">
      <span class="stat-number stat-blue">180</span>
      <span class="stat-label">Cities</span>
    </div>
    <div class="leads-stat">
      <span class="stat-number stat-orange">220,000</span>
      <span class="stat-label">Students</span>
    </div>
  </div>
</section>


<?php
require_once 'Include/footer.php';
?>