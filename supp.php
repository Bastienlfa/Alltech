<?php

    if(isset($_POST['nomsupp']) AND !empty($_POST['nomsupp'])){

        try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    $nomsupp=$_POST['nomsupp'];
    $ajout="DELETE FROM produit WHERE nom='$nomsupp'";
    header('location:espacemembre.php');

        }

         catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
}
    }

?>