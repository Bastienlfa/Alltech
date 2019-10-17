<?php

try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    
    
}

catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();
}

include 'header.php';
include 'sidebar.php';

if(isset($_SESSION['nom']))  { ?>

<link rel="stylesheet" href="css/bootstrap.css" type="texte/css"/>
    <h1> Bienvenue, <?php echo $_SESSION['nom']; ?> </h1>
    <br/>
    <a href="?action=add">Ajouter un produit</a>
    <a href="?action=modif">Modifier un produit</a>
    <a href="?action=supp">retirer un produit</a>


<?php

if((isset($_GET['action'])) AND $_GET['action']=='add'){ ?>

<form action="add.php" method="post" enctype="multipart/form-data" onsubmit="return(valideradd())" name="myformadd">
    <div>
        <label for="nomadd">Nom du produit :</label>
        <input type="text" id="nomadd" name="nomadd">
    </div>
    <div>
        <label for="desadd">Description du produit :</label>
        <input type="text" id="desadd" name="desadd">
    </div>
    <div>

            <label for="catadd">categorie :</label>
            <select name="catadd" id="catadd">
                <?php
                $catprod = "SELECT nom FROM categorie";
                $reqcatprod=$bdd->query($catprod);
                
            while ($donnees=$reqcatprod->fetch()) { ?>

            <option> <?php echo $donnees['nom'];?> </option> 
            
            <?php }?>
            </select>
        </div>
    <div>
        <label for="prixadd">Prix :</label>
        <input type="number" id="prixadd" name="prixadd">
    </div>
    <input type="file" name="img"/>
    <div class="button">
        <button type="submit" value="add">Ajouter l'article </button>
    </div>
</form>

<?php


;}


if((isset($_GET['action'])) AND $_GET['action']=='modif'){ ?>

<form action="modif.php" method="post" onsubmit="return(validermodif())" name="myformod">

<div>
        <label for="nommodd">Nom du produit a Modifier :</label>
        <input type="text" id="nommodif" name="nommodif">
    </div>
    <div>
        <label for="nommodd">Nouveau nom du produit :</label>
        <input type="text" id="nommod" name="nommod">
    </div>
    <div>
        <label for="desmod">Description du produit :</label>
        <input type="text" id="desmod" name="desmod">
    </div>
    <div>

            <label for="cat">categorie :</label>
            <select name="cat" id="cat">
                <?php
                $catprod = "SELECT nom FROM categorie";
                $reqcatprod=$bdd->query($catprod);
                
            while ($donnees=$reqcatprod->fetch()) { ?>

            <option> <?php echo $donnees['nom'];?> </option> 
            
            <?php }?>
            </select>
        </div>
    <div>
        <label for="prixmod">Prix :</label>
        <input type="number" id="prixmod" name="prixmod">
    </div>
    <div class="button">
        <button type="submit" value="add">Modifier l'article </button>
    </div>
</form>
    


<?php
;}

if((isset($_GET['action'])) AND $_GET['action']=='supp'){ ?>

<form action="supp.php" method="post" onsubmit="return(validersupp())" name="myformsupp">
    <div>
        <label for="nomsupp">Nom du produit a supprimer :</label>
        <input type="text" id="nomsupp" name="nomsupp">
    </div>
   
    <div class="button">
        <button type="submit" value="add">Supprimer l'article</button>
    </div>
</form>




<?php
;}
}


else {
header('location:index.php');
}

include ('categorie.php');
include ('footer.php');
?>
<script type="text/javascript" src="valideem.js"></script>

