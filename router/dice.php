<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));

/**
 * Create
 */
$app->router->any(["GET", "POST"], "dice/start", function () use ($app) {

    // Create title.
    $title = "Dice 100";

    if (empty($_SESSION['game'])) {
        $_SESSION['game'] = new \Patrik\Dice\Game("Patrik", 3);
    }

    //$dices = isset($_POST["number"]) ? htmlentities($_POST["number"]) : -1;

    // Create game object
    /*
    if (empty($_SESSION['game'])) {
        $_SESSION['game'] = new \Patrik\Dice\Game("", $dices);
    }
    */
    $data = [
        "title" => $title,
    ];

    $app->page->add("dice/start", $data);

    return $app->page->render([
        "title" => "Dice 100 - Create",
    ]);

});
