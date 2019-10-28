<?php

include 'header.php';
include 'sidebar.php';


try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');

}

    catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
    }

    $affichage = "SELECT * FROM produit";
    $reqaffichage=$bdd->query($affichage);

    if(isset($_SESSION['nom'])) {  

    while ($donnees=$reqaffichage->fetch()) {
        ?> 
        <h2><?php echo $donnees['nom'];?></h2><br/>
        <h5><?php echo $donnees['description'];?></h5> <br/> 
        <h4> <?php echo $donnees['prix'];?></h4> <br/> 
        <a href="panier.php?action=ajout&amp;l=<?php echo $donnees['nom'];?> &amp;q=1 &amp;p=<?php echo $donnees['prix'];?>">Ajouter au panier</a>
         <?php
        
    }

}

else 
{
    while ($donnees=$reqaffichage->fetch()) {
        ?> 
        <h2><?php echo $donnees['nom'];?></h2><br/>
        <h5><?php echo $donnees['description'];?></h5> <br/> <?php

    
    
}

}
include 'footer.php';


    ?>