<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'users');

session_start();

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_email = $_SESSION['email'];

    $stmt = $conn->prepare("INSERT INTO entries (title, description, user_email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $user_email);

    
    if ($stmt->execute() === true){
        header("Location: viewBlog.php");
    }
}
?>