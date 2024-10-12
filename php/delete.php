<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'users');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
// Check if the user is logged in and is an admin
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['admin']) && $_SESSION['admin']) {
    if(isset($_POST['postId'])) {
        $postId = $_POST['postId'];

        
        // Prepare statement to prevent SQL injection
        // $stmt = $conn->prepare("DELETE FROM entries WHERE `entries`.`id` = ?");
        // $stmt->bind_param("i", $postId);

        $sql = "Delete from entries where entries.id = $postId";

        if($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => "PostId: $postId"]);
        }

        $conn->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Post ID not provided.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Unauthorized access.']);
}

?>