<?php 
$title="News And Events";
require_once 'Include/header.php';
?>

   <br>   <div class="section-title">News & Events</div>   <br>

  <div class="slider-container">
    <div class="slider-track" id="sliderTrack">
      
      <div class="slider-card">
        <img src="School images/g1.jpeg"  alt="Quote">
        <div class="card-content">
          <div class="category">Quote</div>
          <div class="date">20 May 2025</div>
          <div class="title">Quote of the Week</div>
        </div>
      </div>
      
      <div class="slider-card">
        <img src="School images/g2.jpeg" alt="Quotation">
        <div class="card-content">
          <div class="category">Quote</div>
          <div class="date">12 February 2025</div>
          <div class="title">Quote of the Week</div>
        </div>
      </div>
     
      <div class="slider-card">
        <img src="School images/g3.jpeg" alt="Blood Donor Day">
        <div class="card-content">
          <div class="category">Blood Donor Day</div>
          <div class="date">14 June 2025</div>
          <div class="title">"Donate Blood, Save Lives. Every Drop Counts!" </div>
        </div>
      </div>
      
      <div class="slider-card">
        <img src="School images/g5.jpeg" alt="Quotation">
        <div class="card-content">
          <div class="category">Quotation</div>
          <div class="date">21 January 2025</div>
          <div class="title">Quote of the Week</div>
        </div>
      </div>
      
      <div class="slider-card">
        <img src="School images/g6.jpeg" alt="Quotation">
        <div class="card-content">
          <div class="category">Quotation</div>
          <div class="date">13 January 2025</div>
          <div class="title">Quote of the Week</div>
        </div>
      </div>
     
      <div class="slider-card">
        <img src="School images/g4.jpeg" alt="Child labour day">
        <div class="card-content">
          <div class="category">Child labour </div>
          <div class="date">13 June 2025</div>
          <div class="title">"Give Children a Childhood, Not a Toolbox."</div>
        </div>
      </div>
    
      <div class="slider-card">
        <img src="School images/g7.jpeg" alt="Good work">
        <div class="card-content">
          <div class="category"> نیک کام کر نا صدقہ ہے  </div>
          <div class="date">19 June 2025</div>
          <div class="title"> اپنی نیکی کو بھولنا اور دوسرے کی نیکی کو یاد رکھنا مومن کی نشا نی ہے</div>
        </div>
      </div>
     
      <div class="slider-card">
        <img src="School images/gp9.jpg" alt="Urdu">
        <div class="card-content">
          <div class="category">Hajj</div>
          <div class="date">5 June 2025</div>
          <div class="title">Hajj Mubarak</div>
        </div>
      </div>
      
      <div class="slider-card">
        <img src="School images/gp10.jpg" alt="Urdu">
        <div class="card-content">
          <div class="category">Hajj</div>
          <div class="date">4 June 2025</div>
          <div class="title">Hajj Mubarak</div>
        </div>
      </div>

        <div class="slider-card">
        <img src="School images/gp8.jpg" alt="Parents Day">
        <div class="card-content">
          <div class="category">Parents Day</div>
          <div class="date">13 Feburary 2025</div>
          <div class="title">"Without parents, Life is Incomplete for the Children."</div>
        </div>
      </div>

        <div class="slider-card">
        <img src="School images/gp11.jpg" alt="Urdu">
        <div class="card-content">
          <div class="category">Hajj</div>
          <div class="date">3 June 2025</div>
          <div class="title">Hajj MUBARAK</div>
        </div>
      </div>
      
    </div>
  </div>

  <script>
    // Slider logic
    const track = document.getElementById('sliderTrack');
    const cards = document.querySelectorAll('.slider-card');
    const cardWidth = cards[0].offsetWidth + 32; 
    let index = 0;

    
    for (let i = 0; i < 3; i++) {
      const clone = cards[i].cloneNode(true);
      track.appendChild(clone);
    }

    function slideNext() {
      index++;
      track.style.transform = `translateX(-${index * cardWidth}px)`;
      
      if (index >= cards.length) {
        setTimeout(() => {
          track.style.transition = 'none';
          index = 0;
          track.style.transform = `translateX(0px)`;
          setTimeout(() => {
            track.style.transition = 'transform 0.7s cubic-bezier(0.4, 0.2, 0.2, 1)';
          }, 50);
        }, 700);}}
    setInterval(slideNext, 2000); 
  </script>


<?php
require_once 'Include/footer.php';
?>