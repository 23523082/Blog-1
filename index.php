<?php 
require 'Loginscript.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginstyle.css"> 
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>My Blog</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>Login</h2>
        <form action="Loginscript.php" method="POST">
            <div class="blog-post">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 My Blog</p>
    </footer>
</body>
</html>
