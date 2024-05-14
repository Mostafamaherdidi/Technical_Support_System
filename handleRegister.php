<?php
require_once "config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$usertype = $_POST["usertype"];
$address = $_POST["address"];

$stmt = $conn->prepare("INSERT INTO users (name, email, password, usertype, address) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $password, $usertype, $address);

if ($stmt->execute()) {
    // Redirect to login page after successful registration
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
