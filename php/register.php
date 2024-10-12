<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);



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
    $email = $_POST['email'];
    $sql = "Select email FROM users WHERE email = '" . $email . "'";

    $result = $conn->query($sql);
    if($result->num_rows == 0){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //hash the password
        $password = $hashedPassword;
        //make the password == hashed password
        $_SESSION['admin'] = false;
        
        $stmt = $conn->prepare("INSERT INTO users (email, password, name, admin) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("sss", $email, $password, $name);

        if($stmt->execute() === true){
            header("Location: viewBlog.php");
        }
    }else{
        header("Location: ../login.html?DuplicateEmail=true");
    }

    



    
}


?>