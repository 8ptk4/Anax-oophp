<?php
/**
 * Show all movies.
 */
$app->router->get("movie/start", function () use ($app) {
    $app->db->connect();
    $title = "MOVIE DATABASE";
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
 */
$app->router->get("movie/search_year", function () use ($app) {
    $app->db->connect();
    $title = "SEARCH BY YEAR";
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
 */
$app->router->get("movie/search_title", function () use ($app) {
    $app->db->connect();
    $title = "SEARCH BY TITLE";
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



/**
 * SELECT MOVIE
 */
$app->router->any(["GET", "POST"], "movie/movies_select", function () use ($app) {
    $app->db->connect();
    $title = "SELECT";
    $movieId = getPost("movieId");

    if (getPost("doDelete")) {
        $sql = "DELETE FROM movie WHERE id = ?;";
        $app->db->execute($sql, [$movieId]);

        return $app->response->redirect("movie/movies_select");
    } elseif (getPost("doAdd")) {
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $app->db->execute($sql, ["A title", 2017, "img/noimage.png"]);
        $movieId = $app->db->lastInsertId();

        return $app->response->redirect("movie/movies_edit?movieId=$movieId");
    } elseif (getPost("doEdit") && is_numeric($movieId)) {
        return $app->response->redirect("movie/movies_edit?movieId=$movieId");
    }

    $sql = "SELECT id, title FROM movie;";
    $movies = $app->db->executeFetchAll($sql);
    $app->page->add("moviedb/movies_select", [
        "title" => $title,
        "movies" => $movies,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * EDIT MOVIE
 */
 $app->router->any(["GET", "POST"], "movie/movies_edit", function () use ($app) {
    $title = "UPDATE";

    $app->db->connect();

    $movieId    = getPOST("movieId") ?: getGet("movieId");
    $movieTitle = getPost("movieTitle");
    $movieYear  = getPost("movieYear");
    $movieImage = getPost("movieImage");

    if (getPost("doSave")) {
        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage, $movieId]);

        return $app->response->redirect("movie/start");
    }

    $sql = "SELECT * FROM movie WHERE id = ?;";
    $movie = $app->db->executeFetchAll($sql, [$movieId]);
    $movie = $movie[0];

    $data = [
        "title" => $title,
        "movieId" => $movieId,
        "movieTitle" => $movieTitle,
        "movieYear" => $movieYear,
        "movieImage" => $movieImage,
        "movie" => $movie,
    ];

     $app->page->add("moviedb/movies_edit", $data);

     return $app->page->render([
         "title" => $title,
     ]);
 });
