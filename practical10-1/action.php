<?php
$con = mysqli_connect("localhost", "root", "", "test");

if (isset($_POST['submit'])) {
    // Insert new record
    $En = $_POST['En'];
    $Fname = $_POST['Fname'];
    $Sem = $_POST['Sem'];
    $Pre = $_POST['Pre'];

    mysqli_query($con, "INSERT INTO student (EN, Fname, Sem, Presentage) VALUES ('$En', '$Fname', '$Sem', '$Pre')");
    header("Location: index.php");

} elseif (isset($_POST['update'])) {
    // Update existing record
    $En = $_POST['En'];
    $Fname = $_POST['Fname'];
    $Sem = $_POST['Sem'];
    $Pre = $_POST['Pre'];

    mysqli_query($con, "UPDATE student SET Fname='$Fname', Sem='$Sem', Presentage='$Pre' WHERE EN='$En'");
    header("Location: index.php");

} elseif (isset($_GET['delete'])) {
    // Delete a record
    $En = $_GET['delete'];
    mysqli_query($con, "DELETE FROM student WHERE EN='$En'");
    header("Location: index.php");
}
?>
