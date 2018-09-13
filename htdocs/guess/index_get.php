<?php
require "config.php";
require "autoload.php";

// Page title
$title = "(GET)";

// Form values
$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

// Create a game
$game = new Guess($number, $tries);

// Reset the game
if (isset($_GET["doReset"])) {
    $game->random();
}

// Do a guess
$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}

require(__DIR__ . "/view/get.php");
