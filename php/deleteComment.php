<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'users');



$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['commentId'])){
        $comment_id = $_POST['commentId'];

        $sql = "Delete from comments where comments.comment_id = $comment_id";
        if($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => "CommentId: $comment_id"]);
        }

        $conn->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Post ID not provided.']);
    }
}
?>