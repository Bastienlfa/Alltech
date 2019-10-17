<?php

//ajouter supprimer modifier cateforie 


try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
}

catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
    <link rel="stylesheet" href="css/bootstrap.css" type="texte/css"/>
        <br/>
        <a href="?action=addcat">Ajouter une categorie</a>
        <a href="?action=modcat">Modifier une categorie</a>
        <a href="?action=suppcat">Supprimer une categorie</a>



<?php






if((isset($_GET['action'])) AND $_GET['action']=='addcat') { 
   
    ?>

<form action="categorie.php" method="post" onsubmit="" name="myformaddcat">
    <div>
        <label for="catnomadd">Nom de la categorie a ajouter :</label>
        <input type="text" id="catnomadd" name="catnomadd">
    </div>
    <div class="button">
        <button type="submit" value="add">Ajouter la categorie </button>
    </div>
</form>


<?php }
if((isset($_GET['action'])) AND $_GET['action']=='modcat') {
    

?>
    <form action="categorie.php" method="post" onsubmit="" name="myformodcat">
    <div>
        <label for="catnom">Nom de la categorie a modifier :</label>
        <input type="text" id="catnom" name="catnom">
    </div>
    <div>
        <label for="catmod">Nouveau nom de la categoerie:</label>
        <input type="text" id="catmod" name="catmod">
    </div>
    <div class="button">
        <button type="submit" value="add">Modifier la categorie </button>
    </div>
</form>
<?php 
}

if((isset($_GET['action'])) AND $_GET['action']=='suppcat') {
     ?>

    <form action="categorie.php" method="post" onsubmit="" name="myformsuppcat">
    <div>
        <label for="catnom">Nom de la categorie a modifier :</label>
        <input type="text" id="catnom" name="catnom">
    </div>
    <div class="button">
        <button type="submit" value="add">Supprimer la categorie </button>
    </div>
</form>
    

<?php }


if (isset($_POST['catnomadd']) AND !empty($_POST['catnomadd'])){
    
    $nomcatad=$_POST['catnomadd'];

    $ajoutc="INSERT INTO categorie (nom) VALUE ('$nomcatad')";
    $reqadd= $bdd->query($ajoutc);
    header('location:espacemembre.php');
    
}

if(isset($_POST['catnom']) AND !empty($_POST['catnom'])AND
isset($_POST['catmod']) AND !empty($_POST['catmod'])){

    $nomcat=$_POST['catnom'];
    $modcat=$_POST['catmod'];
    $modc="UPDATE categorie SET nom='$modcat' WHERE nom='$nomcat'";
    $reqmodc= $bdd->query($modc);
    
}

if(isset($_POST['catnom']) AND !empty($_POST['catnom'])){

    $nomcat=$_POST['catnom'];

    $supc="DELETE FROM categorie WHERE nom='$nomcat'";
    $reqsupc= $bdd->query($supc); }

   
?>
