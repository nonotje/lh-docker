<?php

$mysqli = new mysqli("db", "root", "mangos", "realmd");
$result = $mysqli->query("SELECT COUNT(*) AS count FROM account");
$row = $result->fetch_assoc();
$accounts = htmlentities($row['count']);

$result = $mysqli->query("SELECT COUNT(online) AS population FROM account WHERE online<>0");
$row = $result->fetch_assoc();
$population = htmlentities($row['population']);

$load = 'failure.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $load = 'form.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account = trim($_POST['account']);
    $password = trim($_POST['password']);

    if (preg_match("/^[0-9a-zA-Z]{1,32}$/", $account)) {
        $db_account = strtoupper($account);
        $db_password = sha1((strtoupper($account).':'.strtoupper($password)));

        $db_account = $mysqli->real_escape_string($db_account);
        $db_password = $mysqli->real_escape_string($db_password);

        if($result = $mysqli->query("INSERT INTO account (username, sha_pass_hash) VALUES ('$db_account', '$db_password');")) {
            $load = 'success.php';
        }       
    }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>wow.gsls.be</title>
  </head>
  <body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">wow.gsls.be</h1>
            <p class="lead">Private World of Warcraft 1.12.1 server running <a href="https://github.com/vmangos/core" target="_blank">vmangos</a> source code. Support over <a href="https://discord.gg/MCurptT" target="_blank">Discord</a>.</p>
            <hr class="my-4">
            <button type="button" class="btn btn-secondary">
            Accounts <span class="badge badge-light"><?php echo $accounts ?></span>
            </button>
            <button type="button" class="btn btn-success">
            Online <span class="badge badge-light"><?php echo $population ?></span>
            </button>
            <a href="https://mega.nz/#!uYxBWAYb!4bV1pqFl2-zXRS7063GqzAnt53oe5jTcmlVce9CtKPc" class="btn btn-warning" role="button" aria-pressed="true" target="_blank">Download Client</a>
            <a href="realmlist.wtf" class="btn btn-info" role="button" aria-pressed="true" target="_blank">Download Realmlist.wtf</a>
        </div>

        <?php require($load); ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>