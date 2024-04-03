<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/php/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha384-dfZpZjJZKLOpXDQm2aDM0jF7efvH+2T8XzUmikXr6q0jZ9ZlHAAKRII5oD33J4k5"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar">
      <div class="logo">
        <img src="https://art.pixilart.com/fb41e74302b2297.png" alt="Logo" />
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Search..." />
      </div>
      <?php if (isset($user)): ?>
        
      <p>Welcome <?= htmlspecialchars($user["name"]) ?></p>
      
      <p><a href="php/logout.php">Log out</a></p>
      
  <?php else: ?>
      
      <p><a href="php/login2.php">Log in</a> or <a href="signup.html">sign up</a></p>
      
  <?php endif; ?>
    </nav>
<!-- hier heb je de knoppen om naar de andere pagina's te komen-->
    <div class="iets">
      <div class="div-links">
        <div class="sidebar">
          <a href="index.php"><p>Home</p></a>
          <a href="Forum.php"><p>Forums</p></a>
          <a href="NAV-HTML.php"><p>Games</p></a>
        </div>
      </div>