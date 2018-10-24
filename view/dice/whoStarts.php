<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1><?= $title ?></h1>

<?php if ($state == 0) : ?>
<form method="POST" action="whoStarts" autocomplete="off">
        <input type="submit" name="checkWho" value='Throw Dices'>
</form>
<?php endif; ?>

<?php if ($state == 1) : ?>
<form method="POST" action="play" autocomplete="off">
        <input type="submit" name="checkWho" value='Start the game'>
</form>
<?php endif; ?>


<?= $who ?>

<?php foreach ($_SESSION['game']->players as $player) : ?>
    <h3><?= $player->dicehand->dices[0]->getLastRoll() ?></h3>
<?php endforeach; ?>

<?= var_dump($_SESSION['game']->players) ?>
