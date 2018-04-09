<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<header>
  <? if (isset($_SESSION['username'])) { ?>
  <div><?= $_SESSION['username'] ?></div>
  <form action="/sign-out" method="post">
    <button type="submit" name="sign-out">Se déconnecter</button>
  </form>
  <? } ?>
</header>