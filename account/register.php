<? require 'registerscript.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registerstyle.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <div id="branding">
            <h1>My Blog</h1>
        </div>
    </header>

    <div class="container">
        <div class="blog-post">
            <h2>Register</h2>
            <form action="registerscript.php" method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                </div>

            <label for="type">ACCOUNT TYPE *</label>
        <select id="type" name="type" required>
          <option value="">Select Account Type</option>
          <option value="reader">Reader</option>
          <option value="maker">Article Maker</option>
          <option value="admin">Admin</option>
        </select>
                <button type="submit">Register</button>

            
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
