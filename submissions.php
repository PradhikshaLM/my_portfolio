<?php

$servername = "localhost:3308";
$username = "root"; 
$password = "";  
$dbname = "contact_form"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.html';</script>";
    }
}

$conn->close();
?>
