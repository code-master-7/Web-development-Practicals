<?php
$conn = mysqli_connect("localhost", "root", "", "test");

// Insert employee information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $years_of_experience = $_POST['years_of_experience'];
    $conn->query("INSERT INTO employees (job_title, years_of_experience) VALUES ('$job_title', '$years_of_experience')");
}

$result = $conn->query("SELECT id, job_title, years_of_experience FROM employees ORDER BY years_of_experience ASC");
?>

<html>
<head><title>Employee Information</title></head>
<body>
<h2>Employee Form</h2>
<form method="POST">
    Job Title: <input type="text" name="job_title" required><br><br>
    Years of Experience: <input type="number" name="years_of_experience" required><br><br>
    <input type="submit" value="Add Employee">
</form>

<h2>Employee List</h2>
<table border="1">
    <tr><th>ID</th><th>Job Title</th><th>Years of Experience</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr><td><?= $row["id"] ?></td><td><?= $row["job_title"] ?></td><td><?= $row["years_of_experience"] ?></td></tr>
    <?php endwhile; ?>
</table>
</body>
</html>

<?php $conn->close(); ?>
