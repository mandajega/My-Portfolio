<?php
// Include database connection
include 'db.php';

// Define variables to hold errors and success message
$errors = $success = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form input
    if (empty($_POST['skill'])) {
        $errors = "Skill field is required.";
    } else {
        // Sanitize user input to prevent SQL injection
        $skill = mysqli_real_escape_string($conn, $_POST['skill']);
        
        // Insert new skill into the database
        $sql = "INSERT INTO skills (skill) VALUES ('$skill')";
        if ($conn->query($sql) === TRUE) {
            header("Location: about.php");
    exit();
        } else {
            $errors = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skill - Amanda Jeganathan</title>
</head>
<body>
    <h1>Add Skill</h1>
    <?php if (!empty($errors)): ?>
        <p style="color: red;"><?php echo $errors; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="skill">Skill:</label><br>
        <input type="text" id="skill" name="skill"><br><br>
        <button type="submit">Add Skill</button>
    </form>
</body>
</html>
