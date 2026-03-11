<?php
$title="About Us";
require_once 'Include/header.php';
?>

<style>
.about-body {
    background: linear-gradient(135deg, #fbeeee 0%, #e3e9f7 100%);
    font-family: 'Segoe UI', Arial, sans-serif;
    min-height: 100vh;
}
.about-header {
    background: linear-gradient(90deg, #0a2a4d 60%, #1e5fa1 100%);
    color: #fff;
    text-align: center;
    padding: 40px 0 18px 0;
    letter-spacing: 2px;
    box-shadow: 0 2px 12px rgba(10,42,77,0.08);
}
.about-header h1 {
    font-size: 2.8rem;
    font-weight: 800;
    margin: 0;
    animation: about-slideDown 1s cubic-bezier(.77,0,.18,1) 0.2s both;
}
@keyframes about-slideDown {
    0% { opacity: 0; transform: translateY(-40px);}
    100% { opacity: 1; transform: translateY(0);}
}
.about-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 18px;
}
.about-section-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 18px;
    color: #0a2a4d;
    text-align: center;
    letter-spacing: 1px;
    animation: about-slideLeft 1s cubic-bezier(.77,0,.18,1) 0.6s both;
}
@keyframes about-slideLeft {
    0% { opacity: 0; transform: translateX(-60px);}
    100% { opacity: 1; transform: translateX(0);}
}
.about-section-container {
    max-width: 1100px;
    margin: 48px auto 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    padding: 40px 30px;
    display: flex;
    gap: 40px;
    align-items: flex-start;
    animation: about-fadeIn 1.2s cubic-bezier(.77,0,.18,1) 1.2s both;
    opacity: 0;
    transition: opacity 1s;
}
.about-section-container.visible {
    opacity: 1;
}
@keyframes about-fadeIn {
    0% { opacity: 0; transform: translateY(40px);}
    100% { opacity: 1; transform: translateY(0);}
}
.about-profile-photo {
    flex: 0 0 320px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: linear-gradient(120deg, #f7e9e9 80%, #e9f0fb 100%);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    padding: 24px 0;
    animation: about-slideRight 1.2s cubic-bezier(.77,0,.18,1) 1.4s both;
}
@keyframes about-slideRight {
    0% { opacity: 0; transform: translateX(-60px);}
    100% { opacity: 1; transform: translateX(0);}
}
.about-profile-photo img {
    width: 260px;
    height: 320px;
    object-fit: cover;
    border-radius: 18px;
    margin-bottom: 18px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    transition: transform 0.4s cubic-bezier(.77,0,.18,1);
}
.about-profile-photo img:hover {
    transform: scale(1.04) rotate(-2deg);
}
.about-profile-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: #222;
    margin-bottom: 2px;
    letter-spacing: 0.5px;
}
.about-profile-title {
    color: #666;
    font-size: 1rem;
    font-weight: 400;
}
.about-profile-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    animation: about-fadeInUp 1.2s cubic-bezier(.77,0,.18,1) 1.6s both;
}
.about-profile-description {
    font-size: 1.08rem;
    color: #444;
    line-height: 1.7;
    margin-top: 10px;
    animation: about-textSlide 1.2s cubic-bezier(.77,0,.18,1) 1.8s both;
}
@keyframes about-fadeInUp {
    0% { opacity: 0; transform: translateY(60px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes about-textSlide {
    0% { opacity: 0; transform: translateX(40px);}
    100% { opacity: 1; transform: translateX(0);}
}

/* First section: single fade-in */
.single-slide-section {
    max-width: 1100px;
    margin: 48px auto 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    padding: 40px 30px;
    animation: about-fadeIn 1.2s cubic-bezier(.77,0,.18,1) both;
}
.single-slide-content {
    display: flex;
    flex-wrap: wrap;
    gap: 32px;
    justify-content: center;
}
.single-slide-col {
    flex: 1 1 350px;
    min-width: 320px;
}
.single-slide-box {
    background: linear-gradient(120deg, #f6f8fa 80%, #e9f0fb 100%);
    border-radius: 14px;
    padding: 28px 22px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    font-size: 1.13em;
    color: #333;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
    animation: about-fadeInUp 1.2s cubic-bezier(.77,0,.18,1) both;
    transition: box-shadow 0.3s;
}
.single-slide-box:hover {
    box-shadow: 0 8px 32px rgba(30,95,161,0.13);
}
.single-slide-box p {
    margin: 0;
    line-height: 1.8;
    animation: about-textSlide 1.2s cubic-bezier(.77,0,.18,1) 0.7s both;
}

.custom-section-container {
    max-width: 1100px;
    margin: 48px auto 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    padding: 40px 30px;
    display: flex;
    gap: 40px;
    align-items: center;
    animation: about-fadeIn 1.2s cubic-bezier(.77,0,.18,1) 0.8s both;
    opacity: 0;
    transition: opacity 1s;
}
.custom-section-container.visible {
    opacity: 1;
}
.custom-card {
    width: 40%;
    background-color: #1b2a4e;
    border-radius: 16px;
    color: white;
    padding: 24px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 0 4px 24px rgba(0,123,255,0.13);
    animation: about-fadeInUp 1.2s cubic-bezier(.77,0,.18,1) 1s both;
    min-height: 300px;
    height: 380px;
}
.custom-card-heading {
    margin: 0 0 12px 0;
    font-size: 1.8rem;
}
.custom-card-text {
    margin: 0;
    font-size: 1rem;
    line-height: 1.4;
}
.custom-image-container {
    width: 60%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: about-slideRight 1.2s cubic-bezier(.77,0,.18,1) 1.2s both;
}
.custom-image {
    width: 100%;
    max-width: 700px;
    height: 400px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    transition: transform 0.4s cubic-bezier(.77,0,.18,1);
}
.custom-image:hover {
    transform: scale(1.04) rotate(-2deg);
}

@media (max-width: 900px) {
    .about-section-container,
    .custom-section-container,
    .single-slide-section {
        flex-direction: column;
        align-items: center;
        padding: 30px 10px;
        gap: 24px;
    }
    .about-profile-photo {
        width: 100%;
        max-width: 340px;
    }
    .custom-card, .custom-image-container {
        width: 100%;
        padding: 0;
    }
    .custom-image-container {
        margin-top: 18px;
        padding-left: 0;
    }
}
@media (max-width: 700px) {
    .about-section, .about-section-container, .custom-section-container, .single-slide-section {
        padding: 18px 6px;
    }
    .about-header {
        padding: 28px 0 10px 0;
    }
    .about-header h1 {
        font-size: 2rem;
    }
    .about-section-title {
        font-size: 1.5rem;
    }
}
</style>

<div class="about-body">
    <div class="about-header">
        <h1>About Us</h1>
    </div>
    <div class="about-container">
        
        <section class="single-slide-section mt-4">
            <h2 class="about-section-title text-center mb-4">Why Choose Leads?</h2>
            <div class="single-slide-content">
                <div class="single-slide-col">
                    <div class="single-slide-box">
                        <p>
                            LEADS School System, a project of Lahore LEADS University, is an institution with academic standards par excellence for the basic level. It aims at exploring the talent of every student and strives to ensure one's nourishment of basic skills and capabilities. The students of this institute are groomed in a way that they may continue their academic pursuits in reputed institutions not only in the country but elsewhere in the world. At the same time, they should also excel in co-curricular skills and activities. We are preparing students to compete with the challenges of the 21st century. LEADS School System is expanding with a view to becoming the largest school system all over the country. LEADS School System promotes holistic development of the student through all domains of knowledge. By focusing on the dynamic combination of knowledge, skills, independent critical and creative thought, practical moderate personality development, international-mindedness, and belief in “LIFE SKILLS” based Education.
                        </p>
                    </div>
                </div>
                <div class="single-slide-col">
                    <div class="single-slide-box">
                        <p>
                            LEADS was established in 1995. The basic aim of the educational network is to produce leaders for the nation through holistic development of individuals by providing sound knowledge, higher analytical ability, and commitment to service and respect for the nation. LEADS is an innovating and enterprising organization, welcoming, engaged, and committed to excel in education, research, creating activities, and community partnerships. Therefore, LEADS started its projects in education at all levels named as “LEADS School System”, “LEADS Group of Colleges” and “Lahore LEADS University”.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="custom-section-container" id="customSection">
      <div class="custom-card">
        <h2 class="custom-card-heading"> Giving Best Education is our Goal! </h2>
        <p class="custom-card-text">The basic aim of the educational network is to produce leaders for the nation through a holistic development of the individuals by providing sound knowledge.</p>
      </div>
      <div class="custom-image-container">
        <img src="School images/std1.jpg" alt="image" class="custom-image" />
      </div>
    </section>

    
    <div class="about-section-container" id="mdSection">
        <div class="about-profile-photo">
            <img src="School images/direct.jpg" alt="Profile Photo">
            <div class="about-profile-name">Asad Manzoor Watto</div>
            <div class="about-profile-title">MD, Leads Group</div>
        </div>
        <div class="about-profile-details">
            <div class="about-section-title">Managing Director (Leads Group)</div>
            <div class="about-profile-description">
                <strong>Mr Asad Manzoor Wattoo (MD)</strong> has been leading the inspiring team of LEADS with his clear vision and responsibility to set high standards and a focus on quality education. Being a graduate of the University of Sussex (University in Brighton, England) in Marketing, he is utilizing his expertise to flourish LEADS School System. Mr Asad always feels driven to be an educationist and facilitate the growth and development of the faculty and students with his passion. As a team, we believe that his enthusiasm, positive attitude, and hands-on experience working with educationists will make LEADS an influencing institute in the country.
            </div>
        </div>
    </div>
</div>

<script>

function onScrollAnimate() {
    const customSection = document.getElementById('customSection');
    const mdSection = document.getElementById('mdSection');
    const windowHeight = window.innerHeight;
    [customSection, mdSection].forEach(section => {
        if (section) {
            const rect = section.getBoundingClientRect();
            if (rect.top < windowHeight - 80) {
                section.classList.add('visible');
            }
        }
    });
}
window.addEventListener('scroll', onScrollAnimate);
window.addEventListener('DOMContentLoaded', onScrollAnimate);
</script>

<?php
require_once 'Include/footer.php';
?>