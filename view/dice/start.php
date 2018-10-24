<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
?><h1><?= $title ?></h1>

<div class="information" style="width: 100%; border: 1px solid black; padding: 10px;">
    <p>Gamestate: <?= $_SESSION['game']->state ?></p>
    <p>Playerturn: <?= $_SESSION['game']->playerturn ?></p>
</div>

<?php if ($_SESSION['game']->getState() == 1 || $_SESSION['game']->getState() == 0) : ?>
    <!-- Who Starts -->
    <div style="width: 100%; border: 1px solid black; padding: 10px; margin-top: 12px;">
        <h3>Check who will start</h3>

        <?php
        if ($_SESSION['game']->getState() == 1) {
            echo "<p>" . $_SESSION['game']->players[$_SESSION['game']->getPlayerturn()]->name . " starts the game!</p>";
        }
        ?>

        <form method="post" action="start">
            <?php if ($_SESSION['game']->getState() == 0) : ?>
            <input type='submit' name='doSubmit' value="Throw dices">
            <?php endif; ?>
            <?php if ($_SESSION['game']->getState() == 1) : ?>
            <input type='submit' name='doStart' value="Start the game!">
            <?php endif; ?>
        </form>


        <?php
        if (isset($_POST['doSubmit'])) {
            $_SESSION['game']->whoStarts();

            header("Location: start");
            exit;
        }

        foreach ($_SESSION['game']->players as $player) {
            echo "<h3>" . $player->getName() . "</h3>" . $player->dicehand->dices[0]->getLastRoll();
        }
        ?>

        <?php
        if (isset($_POST['doStart'])) {
            $_SESSION['game']->setState(3);

            header("Location: start");
            exit;
        }
        ?>
    </div>
<?php endif; ?>
<!-- End Who Starts -->

<!-- Play Game -->
<?php if ($_SESSION['game']->getState() == 3) : ?>

    <div style="width: 100%; border: 1px solid black; padding: 10px; margin-top: 12px;">
        <h2>Play Game</h2>

        <form method="post" action="start">
            <?php if ($_SESSION['game']->getState() == 3) : ?>
            <input type='submit' name='doThrow' value="Throw dices!">
            <?php endif; ?>
            <?php if ($_SESSION['game']->getState() == 3) : ?>
            <input type='submit' name='doStore' value="Store points!">
            <?php endif; ?>
        </form>

        <?php

        if (isset($_POST['doThrow'])) {
            $_SESSION['game']->players[$_SESSION['game']->getPlayerturn()]->dicehand->roll();

            header("Location: start");
            exit;
        }

        if (isset($_POST['doStore'])) {
            //$_SESSION['game']->whoStarts();

            $_SESSION['game']->test($_SESSION['game']->getPlayerturn());

            echo $_SESSION['game']->players[$_SESSION['game']->getPlayerturn()]->getTotalPoints();

            echo "TEST";

            if ($_SESSION['game']->players[$_SESSION['game']->getPlayerturn()]->getTotalPoints() == 100) {
                echo "WINNNER WINNER";
            }

            header("Location: start");
            exit;
        }
        ?>
        <div style="width: 100%; border: 1px solid black; padding: 10px; margin-top: 12px;">
            <?= $_SESSION['game']->play($_SESSION['game']->getPlayerturn()) ?>
            <p>Total sum this turn: <?= $_SESSION['game']->temp ?> </p>
        </div>

        <div style="width: 100%; border: 1px solid black; padding: 10px; margin-top: 12px;">
            <h2>Scorescreen</h2>
            <?php foreach ($_SESSION['game']->players as $player) : ?>
                <h3><?= $player->getName() ?>: <?= $player->getTotalPoints() ?></h3>
            <?php endforeach; ?>
        </div>


    </div>
<?php endif; ?>
<!-- End Play Game -->

<!-- Players view -->
<div class="player">

</div>

<!-- Session Information -->
<?= var_dump($_SESSION) ?>
<hr>
<?= var_dump($_SESSION['game']) ?>
<hr>
<?= var_dump($_SESSION['game']->players[0]->dicehand) ?>
<hr>
<?= var_dump($_SESSION['game']->players[1]->dicehand) ?>
<!-- Session information End -->
