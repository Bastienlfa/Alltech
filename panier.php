<?php 
include ('header.php');
include ('sidebar.php');
include ('functionpanier.php');


$erreur=false;
$action=(isset($_POST['action'])?$_POST['action']:(isset($_GET['action']))?$_GET['action']:null);

    $l=(isset($_POST['l'])?$_POST['l']:(isset($_GET['l']))?$_GET['l']:null);
    $q=(isset($_POST['q'])?$_POST['q']:(isset($_GET['q']))?$_GET['q']:null);
    $p=(isset($_POST['p'])?$_POST['p']:(isset($_GET['p']))?$_GET['p']:null);
    echo $action;echo $l;

if($action!==null)
{
    if(!in_array($action,array('ajout','suppression','refresh'))) {
        $erreur=true;

    

    $l= preg_replace('#\v#','',$l);
    $p= floatval($p);

    if(is_array($q)){
         $qteproduit=array();
        $i=0;

        foreach($q as $contenu){
             $qteproduit[$i++]= intval($contenu);
        }
   

    }

}
 else {
     $q=intval($q);
 }   
}

if (!$erreur){



switch($action){

        case "ajout":
        ajouterproduit($l,$q,$p);
        break;

        case "suppression":
        supprimerproduit($l);
        break;
        
        case "refresh":
        for($i = 0;$i<count($qteproduit);$i++){
            modifierqteproduit($_SESSION['panier']['libelleproduit'][$i], round($qteproduit[$i]));
        }
        break;
        case "default":
        break;
    }
}




?>
<form method="post" action="panier.php">

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
        
        if(isset($_GET['deletepanier']) && $_GET['deletepanier']==true){
            supprimerpanier();
        }
        if (creationPanier()){

         $nbproduits = count($_SESSION['panier']['libelleproduit']);

        if($nbproduits <= 0){
            echo'le panier est vide';
        }else{
            for($i=0; $i<$nbproduits;$i++){ ?>

            <tr>


                    
                    <td><br/> <?php echo $_SESSION['panier']['libelleproduit'][$i]; ?></td>
                    <td><br/>  <?php echo $_SESSION['panier']['prixproduit'][$i];?></td>
                    <td><br/>  <?php echo $_SESSION['panier']['qteproduit'][$i];?></td>
                    <td><br/> <input name="q[]" type="number" <?php echo $_SESSION['panier']['qteproduit'][$i]; ?>></td><?php echo $_SESSION['panier']['qteproduit'][$i];?>
                    <td> <a href="panier.php?action=suppression&amp;l=<?php echo ($_SESSION['panier']['libelleproduit'][$i]);?>">x</a></td>
                

            </tr>

                <?php

            } ?>

  <tr> 
  <td>
  <input type ="submit" value = "rafraichir"/>
  <input type = "hidden" name="action" value ="refresh"/>
        <a href="?deletepanier=true">Supprimer le panier</a>
            </td> 

            </tr>
       <?php } ?>
    
    </table>


</form>

<?php
        }
include ('footer.php');


?>