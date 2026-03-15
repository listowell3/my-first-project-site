<?php

// Local server
// $servername = "localhost";
$username = "u942583589_listowell";
$password = "   ";
$dbname = "u942583589_mothercare";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data safely
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$dob   = $_POST['dob'] ?? '';
$email = $_POST['email'] ?? '';

// Basic validation
if (empty($fname) || empty($lname) || empty($dob) || empty($email)) {
    echo "All fields are required";
    exit;
}

// Correct SQL (NO Id column)
$sql = "INSERT INTO care (First_Name, Last_name, Date_of_Birth, Email)
        VALUES ('$fname', '$lname', '$dob', '$email')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Form submitted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>