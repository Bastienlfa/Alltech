<?php
session_start();
if(isset($_SESSION['nom'])) { ?> <html>
    <head>
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet"/>
    </head>
    <header>
        <br><h1>Site All Tech</h1></br>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="espacemembre.php">espace membre</a></li>
            <li><a href="deconnexion.php">Se deConnecter</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="catalogue.php">Notre catalogue</a></li>
            <li><a href="#">Commandes</a></li>
        </ul>
    </header>
    <body>
    <h1></h1>
    </body>
    </html>
    

    <?php  ;} ?>
<?php
if(!isset($_SESSION['nom']))
 {?>

<html>
<head>
<link href="/css/bootstrap.css" type="text/css" rel="stylesheet"/>
</head>
<header>
    <br><h1>Site All Tech</h1><br><br><br>
    <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="inscription.php">S'inscrire</a></li>
        <li><a href="Connexion.php">Se Connecter</a></li>
        <li><a href="catalogue.php">Notre catalogue</a></li>
        <li><a href="demande-franchise.php">Devenir franchisé</a></li>
    </ul>
</header>
<body>
<h1>titre</h1>
</body>
</html>
<?php ;} ?>
