<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

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
    $password = $_POST['password'];

    $sql = "Select password, admin, id, name FROM users WHERE email = '" . $email . "'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){//if the password given(string) matches the hashed password
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            if($row['admin'] == 1){ //if admin then 
                $_SESSION['admin'] = 1;
                
                header("Location: addPost.php");//go to add Post
            }else{

                $_SESSION["admin"] = 0;
                
                header("Location: viewBlog.php"); //if not admin go to see the blog
            }
            
        }
        else{
            header("Location: ../login.html?wrongPassword=true");
        }
    }
    else{
        header("Location: ../login.html?wrongEmail=true");
    }
}


?>

