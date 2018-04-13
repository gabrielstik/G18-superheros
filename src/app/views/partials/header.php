<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="viewport" content="user-scalable=no">
        <title>Jarvis game</title>

        <!--    CSS    -->
        <link href="./assets/css/style.min.css" media="screen and (min-width:600px)" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


        <!--   Icons    -->
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon_package_v0.16-1/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon_package_v0.16-1/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon_package_v0.16-1/favicon-16x16.png">
        <link rel="manifest" href="./assets/images/favicon_package_v0.16-1/site.webmanifest">
        <link rel="mask-icon" href="./assets/images/favicon_package_v0.16-1/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

    </head>

    <body>

        <div class="menu">

            <a href="#home" target="_blank" id="home"><img src="./assets/images/jarvis.png"  alt="logo" class="jarvis"/></a>

            <nav>
                <ul>
                    <li> <a href="/">HOME</a></li>
                    <li><a href="/matches">GAME</a></li>
                    <? if (isset($_SESSION['username'])) { ?>
                      <li> <a href="/collection">CARDS</a></li>
                    <? } ?>
                    <li> <a href="/leaderboard">RANK</a></li>
                    <? if (isset($_SESSION['username'])) { ?><li><a href="/shop">SHOP</a></li><? } ?>
                    <li><a href="/rules">RULES</a></li>
                    <? if (isset($_SESSION['username'])) { ?>
            <li><a href="/sign-out" id="profil">Se déconnecter</a></li>
                    <? }
                    else { ?>
            <li><a href="/sign-in" id="connexion">Connexion</a></li>
            <? } ?>
                </ul>
            </nav>
        </div>