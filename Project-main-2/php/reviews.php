<?php

if (empty($_POST["name"])) {
    die("Schrijf je naam!");
}

if ( ! filter_var($_POST["rating"])) {
    die("Wat is uw rating?");
}

if (strlen($_POST["review"]) < 8) {
    die("Schrijf een langere review");
}

$sql = "INSERT INTO reviews (name, rating, review)
        VALUES (?, ?, ?)";

$mysqli = require __DIR__ . "/database.php";

?>