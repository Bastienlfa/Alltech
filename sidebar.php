<div class="sidebar">
    <h4>derniers articles</h4>
   

<?php
 try {
$bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');

}

catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();
}

$sideb = "SELECT * FROM produit ORDER BY id_produit DESC LIMIT 0,3";
$reqside=$bdd->query($sideb);
 

while ($donnees=$reqside->fetch()) {
    ?> 
    <h2><?php echo $donnees['nom'];?></h2><br/>
    <h5><?php echo $donnees['description'];?></h5> <br/>

<?php }?>

</div>