<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'users');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $commentText = $_POST['commentText'];// the comment the user added
    $post_id = $_POST['postId'];
    $author_id = $_POST['authorId'];

    $stmt = $conn->prepare('INSERT INTO comments (post_id, author_id, comment_text) VALUES (?,?,?)');
    $stmt->bind_param("sss", $post_id, $author_id, $commentText);

    if($stmt->execute() === true){
        header("Location: viewBlog.php");
    }
}
?>