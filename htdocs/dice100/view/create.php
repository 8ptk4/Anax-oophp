<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Create game</title>
</head>
<body>
    <section class="content">

        <h1>Create game</h1>

        <form method="POST" autocomplete="off">
            <input type="text" name="name" placeholder="Name of the player">
            <!--<input type="number" name="opponents" placeholder="Number of opponents"> -->
            <input type="number" name="dices" placeholder="Amount of dices">

            <input type="submit" name="doSubmit" value="New game">
        </form>
    </section>
</body>
</html>
