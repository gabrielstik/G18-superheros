<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/css/vendor/reset.min.css">
  <link rel="stylesheet" href="./assets/css/style.min.css">
</head>
<body>
<header class="header">
  <nav class="header--nav">
    <ul class="header--nav--list flex flex_between">
      <li class="header--nav--item">
        <a href="/home" title="">Accueil</a>
      </li>
      <li class="header--nav--item">
        <a href="/matches" title="">Les parties</a>
      </li>
      <li class="header--nav--item">
        <a href="/shop" title="">Boutique</a>
      </li>
      <li class="header--nav--item">
        <a href="/leaderboard" title="">Classement</a>
      </li>
      <li class="header--nav--item">
        <a href="/tournament" title="">Tournois</a>
      </li>
    </ul>
  </nav>
  <? if (isset($_SESSION['username'])) { ?>
  <div><?= $_SESSION['username'] ?></div>
  <form action="/sign-out" method="post">
    <button type="submit" name="sign-out">Se déconnecter</button>
  </form>
  <? } ?>
</header>