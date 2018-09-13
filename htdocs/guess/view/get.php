<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <ul class="nav-container">
            <li class="nav-item"><a href="index_get.php">GET</a></li>
            <li class="nav-item"><a href="index_post.php">POST</a></li>
            <li class="nav-item"><a href="index_session.php">SESSION</a></li>
        </ul>
    </header>
    <div class="content">

        <h1><?= $title ?></h1>

        <form method="GET" autocomplete="off">
            <fieldset>
                <legend>
                    <?= $game->tries() ?>
                    <span class="tries">tries left</span>
                </legend>

                <p>Guess a number between 1 and 100</p>

                <input type="hidden" name="number" value="<?= $game->number() ?>">
                <input type="hidden" name="tries" value="<?= $game->tries() ?>">
                <input type="text" name="guess" onfocus="this.value=''" value="<?= $guess ?>" autofocus>
                <input type="submit" name="doGuess" value="Make a Guess">
                <input type="submit" name="doCheat" value="Cheat">
                <input type="submit" name="doReset" value="New game">

                <div class="information">

                    <?php if (isset($res)) : ?>
                        <p><?= $res ?></p>
                    <?php endif; ?>

                    <?php if (isset($_GET["doCheat"])) : ?>
                        <p>Cheat: <?= $game->number() ?></p>
                    <?php endif; ?>

                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
