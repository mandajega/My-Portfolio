<?php

include 'db.php';

$sql = "SELECT * FROM skills";
$result = $conn->query($sql);

$skills = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $skills[] = $row['skill']; 
    }
}

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

$projects = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row; 
    }
}



$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FAVICON ===============-->
    <link
      rel="shortcut icon"
      href="assets/img/image.png"
      type="image/x-icon"
    />

    <!--=============== REMIXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />

    <style>
      
    .perfil__content2{  
      width: 180px;
      height:180px;
      border: 10px solid var(--first-color);
      border-radius: 50%;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      background: linear-gradient(180deg,
                               hsl(var(--hue), 90%, 80%)
                               hsl(var(--hue), 90%, 30%));

    }

    .perfil__img2{
      width: 220px;
      height: 165px;
      

      
      
    }

    .skills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .skill-card {
        background-color: #D1F2EB;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .skill-name {
        font-weight: bold;
        color: var(--first-color);
    }

    a:link {
      color: var(--first-color);
    }

.projects-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.project {
  background-color: #D1F2EB;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.project-title {
  font-size: 1.2em;
  margin-bottom: 10px;
  color: var(--first-color);
}

.project-description {
  font-size: 1em;
  color: #666;
}


    
    
    </style>

    <title>About - Amanda Jeganathan</title>
  </head>
  <body>
    <!--==================== HEADER ====================-->
    <header class="header header-pages" id="header">
      <nav class="nav container">
        <a href="index.html" class="nav__logo">Amanda</a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.html" class="nav__link">Home</a>
            </li>
            <br />
            <li class="nav__item">
              <a href="about.php" class="nav__link">About Me</a>
            </li>
            
            <br />
            <li class="nav__item">
              <a href="contact.html" class="button">Contact Me</a>
            </li>
            <br />
          </ul>

          <!--Close Button-->
          <div class="nav__close" id="nav-close">
            <i class="ri-close-circle-line"></i>
          </div>
        </div>

        <div class="nav__actions">
          <!--Theme button-->

          <i class="ri-moon-line change-theme" id="theme-button"></i>

          <!--Toggle button-->
          <div class="nav__toggle" id="nav-toggle">
            <i class="ri-apps-2-line"></i>
          </div>
        </div>
      </nav>
    </header>
    
    <main class="main">
      <!--==================== ABOUT ====================-->
      <section class="services section">
        <center>
          <div class="perfil__content2">
            <img
                src="assets/img/mandaapic.jpg"
                alt="image"
                class="perfil__img2"
              /> 
            
          </div>
        </center>
        <br>
          <h2 class="section__title">
          Amanda Jeganathan<br />
          Computer Science Undergraduate
        </h2>
      </section>

      <section class="skills section">
    <h3 class="section__title">My Skills</h3>
    <div class="skills-container">
      
        <?php foreach ($skills as $skill): ?>
            <div class="skill-card">
        
                <div class="skill-name"><?php echo $skill; ?></div>
        
            </div>
        <?php endforeach; ?>
      
    </div>
    <br>
    <center>
      <div class="crud">
    <a href="editskills.php">
    <i class="ri-edit-line"></i>
    </a>
    <a href="addskills.php">
    <i class="ri-add-circle-line"></i>
    </a>
    <a href="deleteskills.php">
    <i class="ri-delete-bin-line"></i>
    </a>
        </div>
        </center>

</section>
<section class="projects section">
  <h3 class="section__title">My Projects</h3>
  <div class="projects-container">
    <?php foreach ($projects as $project): ?>
      <div class="project">
        <h4 class="project-title"><?php echo $project['proj_title']; ?></h4>
        <p class="project-description"><?php echo $project['proj_desc']; ?></p>
        <a href="<?php echo $project['proj_link']; ?>" target="_blank">Link</a>
      </div>
    <?php endforeach; ?>
  </div>
<br>
  <center>
      <div class="crud">
    <a href="editprojects.php">
    <i class="ri-edit-line"></i>
    </a>
    <a href="addprojects.php">
    <i class="ri-add-circle-line"></i>
    </a>
    <a href="deleteprojects.php">
    <i class="ri-delete-bin-line"></i>
    </a>
        </div>
        </center>

</section>

    </main>

    <!--==================== FOOTER ====================-->

    <footer class="footer">
      <div class="footer__container container grid">
        <div class="footer__content grid">
          <a href="index.html" class="footer__logo">Amanda</a>

          <ul class="footer__links">
            <li>
              <a href="about.html" class="footer__link">About Me</a>
            </li>
            <li>
              <a href="work.html" class="footer__link">Portfolio</a>
            </li>
            <li>
              <a href="contact.html" class="footer__link">Contact Me</a>
            </li>
          </ul>

          <div class="footer__social">
            <a
              href="https://www.facebook.com/profile.php?id=100081043687407"
              target="_blank"
              class="footer__social-link"
            >
              <i class="ri-facebook-circle-fill"></i>
            </a>
            <a
              href="https://www.instagram.com/manda.jega/"
              target="_blank"
              class="footer__social-link"
            >
              <i class="ri-instagram-fill"></i>
            </a>
            <a
              href="https://www.linkedin.com/in/amanda-jeganathan-b68a62231/"
              target="_blank"
              class="footer__social-link"
            >
              <i class="ri-linkedin-box-fill"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
