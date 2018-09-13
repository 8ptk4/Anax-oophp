<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with GET.
 */
$app->router->get("gissa/get", function () use ($app) {
    // Form values
    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;

    // Create a game
    $game = new \Patrik\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_GET["doReset"])) {
        $game->random();
    }

    // Do a guess
    $res = null;
    if (isset($_GET["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    $data = [
        "title" => "Guess the number with GET.",
        "game" => $game,
        "res" => $res,
        "number" => $number,
        "tries" => $tries,
        "guess" => $guess,
    ];

    $app->page->add("guess/get", $data);
    return $app->page->render([
        "title" => "Guess the number with GET.",
    ]);
});



/**
 * Guess my number with POST.
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    // // Form values
    $number = isset($_POST["number"]) ? htmlentities($_POST["number"]) : -1;
    $tries = isset($_POST["tries"]) ? htmlentities($_POST["tries"]) : 6;
    $guess = isset($_POST["guess"]) ? htmlentities($_POST["guess"]) : null;

    // Create a game
    $game = new \Patrik\Guess\Guess($number, $tries);

    // Reset the game
    if (isset($_POST["doReset"])) {
        $game->random();
    }

    // Do a guess
    $newGuess = null;
    if (isset($_POST["doGuess"])) {
        $newGuess = $game->makeGuess($guess);
    }

    $data = [
        "title" => "Guess the number with POST.",
        "game" => $game,
        "newGuess" => $newGuess,
        "number" => $number,
        "tries" => $tries,
        "guess" => $guess,
    ];

    $app->page->add("guess/post", $data);
    return $app->page->render([
        "title" => "Guess the number with POST.",
    ]);
});



/**
 * Guess my number with SESSION.
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    // Get guess
    $_SESSION["guess"] = isset($_POST["guess"]) ? htmlentities($_POST["guess"]) : null;

    // Start game
    if (empty($_SESSION['game'])) {
        $_SESSION['game'] = new \Patrik\Guess\Guess();
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
        header("Location: session");
        exit;
    }

    $display = $_SESSION["display"];

    $data = [
        "title" => "Guess the number with SESSION.",
        "tries" => $_SESSION["game"]->tries(),
        "guess" => $_SESSION["guess"],
        "display" => $_SESSION["display"],
    ];

    $app->page->add("guess/session", $data);
    return $app->page->render([
        "title" => "Guess the number with SESSION.",
    ]);
});
