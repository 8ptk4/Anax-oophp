<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?>

<div class="navbar">
<?php foreach ($navbar ?? [] as $item) : ?>
    <a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a>
<?php endforeach; ?>
</div>

<div class="navbar_extra">
    <a href=""><i class="fab fa-facebook"></i></a>
    <a href=""><i class="fab fa-github"></i></a>
    <a href=""><i class="fas fa-envelope-square"></i></a>
    <a href=""><i class="fab fa-codepen"></i></a>
</div>
