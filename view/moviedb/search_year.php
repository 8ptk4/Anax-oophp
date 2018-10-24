<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions

//echo showEnvironment(get_defined_vars(), get_defined_functions());
?><h1><?= $title ?></h1>
<?php include "movies_nav.php" ?>
<div class="form-wrapper" style="width: 100%;">
    <form method="get">
        <input type="hidden" name="route" value="search-year">
        <p>
            <div style="justify-content: space-between;">
            <label>Created between:<br>

                <input type="number" name="year1" value="<?= $year1 ?: 1900 ?>" min="1900" max="2100"/>
                <span style="font-size: 30px">-</span>
                <input type="number" name="year2" value="<?= $year2  ?: 2100 ?>" min="1900" max="2100"/>
            </label>
            </div>
        </p>
        <p>
            <input class="button save" type="submit" name="doSearch" value="Search">
    </form>
</div>
<?php include "movies_table.php" ?>
