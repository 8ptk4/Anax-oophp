<?php
    include(__DIR__ . "/../autoload_namespace.php");
    require "../config.php";
    require_once '../src/Players/players.php';
    require_once '../src/Dice/Dice.php';
    require_once '../src/Dice/DiceHand.php';
    require_once '../src/Dice/Game.php';
    require_once '../src/Dice/GameRound.php';

    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Dice100</title>
</head>
<body>

    <div class="container">
        <?=
            $_SESSION['game']->start();
            //$_SESSION['game']->start();

            //$_SESSION['game']->presentation();


            //var_dump($_SESSION['game']);
            //var_dump($_SESSION['game']->players);
        ?>


    </div>
    <div class="row">
        <!-- Check who will start -->
        <div class="container">

        </div>
        <!-- End Check who will start -->
    </div>
</body>
</html>
