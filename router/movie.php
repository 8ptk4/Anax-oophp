<?php
/**
 * Show all movies.
 */
$app->router->get("movie/start", function () use ($app) {
    $title = "Movie database | oophp";
    $app->db->connect();
    $title = "Show all movies";

    $sql = "SELECT * FROM movie;";

    $res = $app->db->executeFetchAll($sql);

    $app->page->add("moviedb/start", [
        "resultset" => $res,
        "title" => $title,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * SEARCH BY MOVIE YEAR
 * @var [type]
 */
$app->router->get("movie/search_year", function () use ($app) {
    $app->db->connect();
    $title = "SELECT * WHERE year";
    $year1 = getGet("year1");
    $year2 = getGet("year2");
    $resultset = null;

    if ($year1 && $year2) {
        $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
        $resultset = $app->db->executeFetchAll($sql, [$year1, $year2]);
    } elseif ($year1) {
        $sql = "SELECT * FROM movie WHERE year >= ?;";
        $resultset = $app->db->executeFetchAll($sql, [$year1]);
    } elseif ($year2) {
        $sql = "SELECT * FROM movie WHERE year <= ?;";
        $resultset = $app->db->executeFetchAll($sql, [$year2]);
    }

    $app->page->add("moviedb/search_year", [
        "resultset" => $resultset,
        "title" => $title,
        "year1" => $year1,
        "year2" => $year2,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * SEARCH BY MOVIE YEAR
 * @var [type]
 */
$app->router->get("movie/search_title", function () use ($app) {
    $title = "SELECT * WHERE title";
    $app->db->connect();
    $searchTitle = getGet("searchTitle");

    $resultset = null;
    if ($searchTitle) {
        $sql = "SELECT * FROM movie WHERE title LIKE ?;";
        $resultset = $app->db->executeFetchAll($sql, [$searchTitle]);
    }

    $app->page->add("moviedb/search_title", [
        "resultset" => $resultset,
        "title" => $title,
        "searchTitle" => $searchTitle,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
