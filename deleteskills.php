
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
       
       .save-button {
            display: inline-block;
            padding: 10px 20px;
            background-image: linear-gradient(to right, var(--first-color), var(--first-color-light));
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        label.skills{
          text-align: left;
        }
      </style>
    
    <title>Delete Skills - Amanda Jeganathan</title>
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

    <?php

include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {

    foreach ($_POST['skills'] as $skill_id) {

        $safe_skill_id = mysqli_real_escape_string($conn, $skill_id);
        

        $sql = "DELETE FROM skills WHERE id = '$safe_skill_id'";
        $conn->query($sql);
    }
    

    header("Location: about.php");
    exit();
}


$sql = "SELECT * FROM skills";
$result = $conn->query($sql);

$skills = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $skills[] = $row; 
    }
}


$conn->close();
?>

<section class="delete-skills section">
<h1 class="section__title">Delete Skills</h1>
    <form method="post">
    <div style="text-align: left; margin: 0 auto; width: fit-content;">
        <?php foreach ($skills as $skill): ?>
            <label>
                <input type="checkbox" name="skills[]" value="<?php echo $skill['id']; ?>">
                <?php echo $skill['skill']; ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <button class="save-button" type="submit" name="delete">Delete Selected Skills</button>
        </div>
    </form>
        </section>
    
    </main>
   <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>

 