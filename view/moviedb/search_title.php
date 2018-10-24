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
    <form method="get">
        <input type="hidden" name="route" value="search-title">
        <p>
            <label>Title (use % as wildcard):
                <input type="search" name="searchTitle" value="<?= esc($searchTitle) ?>"/>
            </label>
        </p>
            <input class ="button save" type="submit" name="doSearch" value="Search">
    </form>
</div>
<?php include "movies_table.php" ?>
