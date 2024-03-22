<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/image.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
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
      </style>
    <title>Add Skill - Amanda Jeganathan</title>
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

    
    $errors = $success = '';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        if (empty($_POST['skill'])) {
            $errors = "Skill field is required.";
        } else {
                $skill = mysqli_real_escape_string($conn, $_POST['skill']);
            
    
            $sql = "INSERT INTO skills (skill) VALUES ('$skill')";
            if ($conn->query($sql) === TRUE) {

              header("Location: about.php");
              exit();

            } else {
                $errors = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    
    $conn->close();
    ?>

    <section class="add-skills section">
    <h1 class="section__title">Add Skills</h1>
    <?php if (!empty($errors)): ?>
        <p style="color: red;"><?php echo $errors; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form method="post">
      <center>
        <label for="skill">Skill:</label><br><br>
        <input type="text" id="skill" name="skill"><br><br>
        <button type="submit" class="save-button">Add Skill</button>
    </center>
    </form>
    </section>
    </main>

    <script src="assets/js/main.js"></script>
</body>
</html>
