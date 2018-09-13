<?php
require "config.php";
require "autoload.php";

// Start session
session_start();

$title = "Guess the number with SESSION.";

// Get guess
$_SESSION["guess"] = isset($_POST["guess"]) ? htmlentities($_POST["guess"]) : null;

// Start game
if (empty($_SESSION['game'])) {
    $_SESSION['game'] = new Guess();
    $_SESSION["display"] = null;
}

// Reset game
if (isset($_POST["doReset"])) {
    $_SESSION["game"]->random();
    $_SESSION["display"] = null;
}

// Handle new guess
if (isset($_POST["doGuess"])) {
    $_SESSION["display"] = $_SESSION["game"]->makeGuess($_SESSION["guess"], $_SESSION["game"]->tries);
    header("Location: index_session.php");
    exit;
}

$display = $_SESSION["display"];

require(__DIR__ . "/view/session.php");
