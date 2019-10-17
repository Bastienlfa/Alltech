<?php 

include ('header.php');
include ('sidebar.php');
include ('functionpanier.php');

$erreur=false;
$action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action']))?$_GET['action']:null);
$l=(isset($_POST['l'])?$_POST['l']:(isset($_GET['l']))?$_GET['l']:null);
$q=(isset($_POST['q'])?$_POST['q']:(isset($_GET['q']))?$_GET['q']:null);
$p=(isset($_POST['p'])?$_POST['p']:(isset($_GET['p']))?$_GET['p']:null);


if($action!==null){
    if(in_array($action,array('ajout','suppression','refresh'))){
        $erreur=true;
    
}

switch($action){

        case "ajout":
        ajouterproduit($l,$q,$p);
        break;

        case "suppression":
        supprimerproduit($l);
        break;
        
        case "refresh":
        for($i = 0;$i<count($qteproduits);$i++){
            modifierqteproduit($_SESSION['panier']['libelleproduit'][$i], round($qteproduits));
        }
        break;
        case "default":
        break;
    }


}


?>
<form action="" method="POST">

    <table>
        <tr>
            <td>Votre panier</td>
        </tr>
        <tr>
            <td>Libelle produit</td>
            <td>Prix unitaire</td>
            <td>Quantite</td>
            <td>action</td>
        </tr>

        <?php 
        
        if(isset($_GET['deletepanier']) && $_GET['deletepanier'==true]){
            supprimerpanier();
        }
        if (creationPanier()){

         $nbproduits = count($_SESSION['panier']['libelleproduit']);

        if($nbproduits<=0){
            echo'le panier est vide';
        }else{
            for($i=0; $i<$nbproduits;$i++){


                echo $_SESSION['panier']['libelleproduit'][$i];
                echo $_SESSION['panier']['qteproduit'][$i];
                echo $_SESSION['panier']['prixproduit'][$i];
                ?> <a href="panier.php?action=suppression&amp;l<?php echo rawurlencode($_SESSION['panier']['libelleproduit'][$i]);?>">x</a>
                <a href="?deletepanier=true">Supprimer le panier</a>

                <?php

            }
        } ?>
    
    </table>


</form>

<?php
        }
include ('footer.php');
?>