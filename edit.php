<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update skills in the database
    foreach ($_POST['skills'] as $id => $skill) {
        $sql = "UPDATE skills SET skill = '$skill' WHERE id = $id";
        $conn->query($sql);
    }
    // Redirect back to edit page
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
    <title>Edit Skills - Amanda Jeganathan</title>
</head>
<body>
    <h1>Edit Skills</h1>
    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Skill</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skills as $skill): ?>
                    <tr>
                        <td><?php echo $skill['id']; ?></td>
                        <td><input type="text" name="skills[<?php echo $skill['id']; ?>]" value="<?php echo $skill['skill']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit">Save</button>
    </form>
</body>
</html>
