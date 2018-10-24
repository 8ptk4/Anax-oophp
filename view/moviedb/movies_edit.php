<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
//var_dump($movie);
?><h1><?= $title ?></h1>

<?php include "movies_nav.php" ?>
<div class="form-wrapper">
    <form method="post">
        <input type="hidden" name="movieId" value="<?= $movieId ?>"/>

        <p>
            <label>Title:<br>
            <input type="text" name="movieTitle" value="<?= $movie->title ?>"/>
            </label>
        </p>

        <p>
            <label>Year:<br>
            <input type="number" name="movieYear" value="<?= $movie->year ?>"/>
        </p>

        <p>
            <label>Image:<br>
            <input type="text" name="movieImage" value="<?= $movie->image ?>"/>
            </label>
        </p>

        <p>
            <input class="button save" type="submit" name="doSave" value="Save">
            <input class="button reset" type="reset" value="Reset">
        </p>
    </form>
</div>
