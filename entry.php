<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'newweb';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $gmail = $_POST['email'];
    $pwd = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO account (email, password) VALUES ('$gmail', '$pwd')";
    if ($conn->query($sql) === TRUE) {
     // Redirect to services.html
     header("Location: services.html");
     exit();
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
}

// Close the database connection
$conn->close();
?>