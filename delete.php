<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Loop through the posted skills to delete
    foreach ($_POST['skills'] as $skill_id) {
        // Sanitize the skill ID to prevent SQL injection
        $safe_skill_id = mysqli_real_escape_string($conn, $skill_id);
        
        // Delete the skill from the database
        $sql = "DELETE FROM skills WHERE id = '$safe_skill_id'";
        $conn->query($sql);
    }
    
    // Redirect back to delete page
    header("Location: about.php");
    exit();
}

// Fetch skills from the database
$sql = "SELECT * FROM skills";
$result = $conn->query($sql);

$skills = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $skills[] = $row; 
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
    <title>Delete Skill - Amanda Jeganathan</title>
</head>
<body>
    <h1>Delete Skill</h1>
    <form method="post">
        <?php foreach ($skills as $skill): ?>
            <label>
                <input type="checkbox" name="skills[]" value="<?php echo $skill['id']; ?>">
                <?php echo $skill['skill']; ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <button type="submit" name="delete">Delete Selected Skills</button>
    </form>
</body>
</html>
