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
<header class="header flex flex_between">
  <div class="header--logo">
    
  </div>
  <nav class="header--nav">
    <ul class="header--nav--list flex flex_evenly">
      <li class="header--nav--item">
        <a href="/home" title="">Accueil</a>
      </li>
      <? if (isset($_SESSION['username'])) { ?>
      <li class="header--nav--item">
        <a href="/matches" title="">Les parties</a>
      </li>
      <? } ?>
      <? if (isset($_SESSION['username'])) { ?>
      <li class="header--nav--item">
        <a href="/collection" title="">Ma collection</a>
      </li>
      <? } ?>
      <? if (isset($_SESSION['username'])) { ?>
      <li class="header--nav--item">
        <a href="/shop" title="">Boutique</a>
      </li>
      <? } ?>
      <li class="header--nav--item">
        <a href="/leaderboard" title="">Classement</a>
      </li>
      <? if (isset($_SESSION['username'])) { ?>
      <li class="header--nav--item">
        <a href="/tournament" title="">Tournois</a>
      </li>
      <? } ?>
    </ul>
  </nav>
  <div class="header--account">
    <? if (isset($_SESSION['username'])) { ?>
    <form class="flex flex_between" action="/sign-out" method="post">
      <div class="header--account--username"><?= $_SESSION['username'] ?></div>
      <button class="header--account--button" type="submit" name="sign-out">Se déconnecter</button>
    </form>
    <? } else { ?>
    <a href="sign-in" class="header--account--button">Se connecter</a>
    <? } ?>
  </div>
</header>