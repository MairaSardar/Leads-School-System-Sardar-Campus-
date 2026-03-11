
<?php 
$title="E-Learning";
require_once 'Include/header.php';
?>
<style>
body {
  background: wheat;
}

main {
  max-width: 1200px;
  margin: 0 auto;
  padding: 32px 16px 48px 16px;
}

h1, h2 {
  text-align: center;
  color: #ff7a00;
  margin-bottom: 24px;
  font-weight: bold;
}

.grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 36px;
  margin: 32px 0;
}

.card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.10);
  padding: 32px 20px 20px 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.2s, box-shadow 0.2s;
  min-height: 300px; 
}

.card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 8px 32px rgba(0,0,0,0.13);
}

.card img {
  width: 90px;
  height: 90px;
  object-fit: contain;
  margin-bottom: 16px;
}

.card h3 {
  margin: 10px 0 14px 0;
  font-size: 1.25rem;
  font-weight: 700;
  color: #162945;
}

.card label {
  margin-bottom: 8px;
  font-weight: 500;
  display: block;
  color: #444;
}

.dark-select {
  width: 100%;
  padding: 8px 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  margin-bottom: 16px;
  margin-top: 2px;
  font-size: 1rem;
}

.resource-links {
  margin-top: 8px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

@media (max-width: 900px) {
  .grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 600px) {
  .grid {
    grid-template-columns: 1fr;
  }
  .card {
    min-height: 0;
  }
}
</style>
<br><br>
<h1>Pak E-Learning</h1>
<main>
    <h2 id="subjects">Subjects</h2>
    <div class="grid">
        <!-- English -->
        <div class="card">
            <img src="School images/E Learning/eng.jpg" alt="English">
            <h3>English</h3>
            <select id="english-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/english-medium/','_blank');}">
               <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4-10">Class 4-10</option>
            </select>
            
        </div>
        <!-- Urdu -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/language.png" alt="Urdu">
            <h3>اردو</h3>
            <select id="urdu-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/urdu-medium/','_blank');}">
                <option value="">جماعت منتخب کریں  </option>
                <option value="playgroup"> پلے گروپ</option>
                <option value="class1">جماعت 1</option>
                <option value="class2">جماعت 2</option>
                <option value="class3">جماعت 3</option>
                <option value="class4-10">جماعت 4-10</option>
            </select>
            
        </div>
        <!-- Islamiyat -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/mosque.png" alt="Islamiyat">
            <h3>Islamiyat</h3>
            <select id="islamiyat-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/islamiyat/','_blank');}">
                <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4-10">Class 4-10</option>
            </select>
            
        </div>
        <!-- Math -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/calculator.png" alt="Math">
            <h3>Math</h3>
            <select id="math-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/mathematics/','_blank');}">
                <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4-10">Class 4-10</option>
            </select>
            
        </div>
        <!-- Science -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/test-tube.png" alt="Science">
            <h3>Science</h3>
            <select id="science-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/science/','_blank');}">
                <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4-10">Class 4-10</option>
            </select>
            
        </div>
        <!-- Social Studies -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/globe--v2.png" alt="Social Studies">
            <h3>Social Studies</h3>
            <select id="sst-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/social-studies/','_blank');}">
                <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4-10">Class 4-10</option>
            </select>
           
        </div>
        <!-- Art -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/paint-palette.png" alt="Art">
            <h3>Art</h3>
            <select id="art-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.youtube.com/results?search_query=art+lessons+for+kids','_blank');}">
                <option value="">Select Class</option>
                <option value="Playgroup">Playgroup</option>
                <option value="class1">Class 1</option>
                <option value="class2">Class 2</option>
                <option value="class3">Class 3</option>
                <option value="class4">Class 4</option>
                <option value="class5">Class 5</option>
            </select>
        </div>
        <!-- Biology (9-10) -->
        <div class="card">
            <img src="School images/E Learning/bio.jpg" alt="Biology">
            <h3>Biology (9-10)</h3>
            <select id="bio-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/biology/','_blank');}">
                <option value="">Select Class</option>
                <option value="class9">Class 9</option>
                <option value="class10">Class 10</option>
            </select>
            
        </div>
        <!-- Physics (9-10) -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/physics.png" alt="Physics">
            <h3>Physics (9-10)</h3>
            <select id="phy-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/physics/','_blank');}">
                <option value="">Select Class</option>
                <option value="class9">Class 9</option>
                <option value="class10">Class 10</option>
            </select>
            
        </div>
        <!-- Chemistry (9-10) -->
        <div class="card">
            <img src="School images/E Learning/chem.png" alt="Chemistry">
            <h3>Chemistry (9-10)</h3>
            <select id="chem-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/chemistry/','_blank');}">
                <option value="">Select Class</option>
                <option value="class9">Class 9</option>
                <option value="class10">Class 10</option>
            </select>
            
        </div>
        <!-- Computer (9-10) -->
        <div class="card">
            <img src="https://img.icons8.com/color/96/000000/computer.png" alt="Computer">
            <h3>Computer (9-10)</h3>
            <select id="comp-select" class="dark-select"
              onchange="if(this.value){window.open('https://www.sabaq.pk/computer-science/','_blank');}">
                <option value="">Select Class</option>
                <option value="class9">Class 9</option>
                <option value="class10">Class 10</option>
            </select>
            
        </div>
    </div>
</main>

<?php
require_once 'Include/footer.php';
?>