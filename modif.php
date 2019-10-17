<?php

    if(isset($_POST['nommodif']) AND !empty($_POST['nommodif']) AND
    isset($_POST['nommod']) AND !empty($_POST['nommod']) AND
    isset($_POST['desmod']) AND !empty($_POST['desmod']) AND
    isset($_POST['prixmod']) AND !empty($_POST['prixmod'])) {

try {
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    $nomodif=$_POST['nommodif'];
    $catmod=$_POST['cat'];
    $nomod=$_POST['nommod'];
    $descriptionmod=$_POST['desmod'];
    $prixmod=$_POST['prixmod'];


    $mod="UPDATE produit SET nom='$nomod', prix='$prixmod',categorie='$catmod', description='$descriptionmod' WHERE nom='$nomodif'";
    $reqmod= $bdd->query($mod);
    header('location:espacemembre.php'); }

  
    catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
}    

}


   

   

?>