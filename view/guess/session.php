<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1><?= $title ?></h1>
                <form method="POST" autocomplete="off">
                    <fieldset>
                        <legend>
                            <?= $tries ?><span class="tries">tries left</span>
                        </legend>

                        <p>Guess a number between 1 and 100</p>

                        <input type="text" name="guess" onfocus="this.value=''" value="<?= $guess ?>" autofocus>
                        <input type="submit" name="doGuess" value="Guess number">
                        <input type="submit" name="doCheat" value="Cheat">
                        <input type="submit" name="doReset" value="New game">

                        <div class="information">
                            <p><?= $_SESSION["display"] ?></p>
                            
                            <?php if (isset($_POST["doCheat"])) : ?>
                                <p>Cheat: <?= $_SESSION["game"]->number(); ?></p>
                            <?php endif; ?>

                        </div>
                    </fieldset>
                </form>
