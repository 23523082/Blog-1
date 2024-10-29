<?php

$servername = "localhost"; 
$username = "Vibe"; 
$password = ""; 
$dbname = "article"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $result = $stmt->get_result();

  
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password_input, $user['password'])) {
           
            session_start();
            $_SESSION['username'] = $username_input;
            header("Location: home.php"); 
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
