<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: ../index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
        <title>Signup</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css2.css">
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
        <script src="/js/validation.js" defer></script>
    </head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Log in</button>
    </form>
    
</body>
</html>


<html lang="en">
  <head>
        <title>Signup</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css2.css">
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
        <script src="/js/validation.js" defer></script>
    </head>
<body>
    <div class="form">
    <p>Register</p>
    <form>
        
        <label for="name">Name</label>
        <input type="text" name="Name" placeholder="Name">
        
        <label for="email">Email</label>
        <input type="=text" name="Email" placeholder="Email">
        
        <label for="password">Password</label>
        <input type="password" name="Password" placeholder="Password">
        
        <button>Sign Up</button>
    </form>
    </div>
</body>
</html>







