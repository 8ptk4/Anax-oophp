<?php
require "config.php";
require "autoload.php";


// Page title
$title = "(POST)";


// // Form values
$number = isset($_POST["number"]) ? htmlentities($_POST["number"]) : -1;
$tries = isset($_POST["tries"]) ? htmlentities($_POST["tries"]) : 6;
$guess = isset($_POST["guess"]) ? htmlentities($_POST["guess"]) : null;


// Create a game
$game = new Guess($number, $tries);


// Reset the game
if (isset($_POST["doReset"])) {
    $game->random();
}


// Do a guess
$newGuess = null;
if (isset($_POST["doGuess"])) {
    $newGuess = $game->makeGuess($guess);
}


require(__DIR__ . "/view/post.php");
