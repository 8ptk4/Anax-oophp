<?php
/**
 * Show all movies.
 */
$app->router->get("content/start", function () use ($app) {
    $title = "MOVIE DATABASE";

    $app->page->add("contentdb/start", [
        "title" => $title,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
