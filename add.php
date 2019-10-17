<?php

    if(isset($_POST['nomadd']) AND !empty($_POST['nomadd']) AND
    isset($_POST['desadd']) AND !empty($_POST['desadd']) AND
    isset($_POST['prixadd']) AND !empty($_POST['prixadd'])AND
    isset($_POST['catadd']) AND !empty($_POST['catadd'])) {


try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    $nomprod=$_POST['nomadd'];
    $descriptionad=$_POST['desadd'];
    $prix=$_POST['prixadd'];
    $catadd=$_POST['catadd'];


    $ajout="INSERT INTO produit (nom,prix,description,categorie) VALUE ('$nomprod', '$prix','$descriptionad','$catadd')";
    $reqadd= $bdd->query($ajout);
    echo'ajouté';
    header('location:espacemembre.php');
    

}


    catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
}

    }

?>
