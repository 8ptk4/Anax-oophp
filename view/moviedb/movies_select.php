<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1><?= $title ?></h1>
<?php include "movies_nav.php" ?>
<div class="form-wrapper">
    <form method="post">
        <p>
            <label>Movie:<br>
                <select id="soflow" name="movieId">
                    <option value="">Select movie...</option>
                    <?php foreach ($movies as $movie) : ?>
                    <option value="<?= $movie->id ?>"><?= $movie->title ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </p>
            <input class="button save" type="submit" name="doAdd" value="Add">
            <input class="button save" type="submit" name="doEdit" value="Edit">
            <input class="button delete" type="submit" name="doDelete" value="Delete">
    </form>
</div>
