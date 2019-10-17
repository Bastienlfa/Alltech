<?php

function creationPanier(){

    try{

        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');

    }
    catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
    }

    if(!isset($_SESSION['panier'])){

        $_SESSION['panier']=array();
        $_SESSION['panier']['libelleproduit']=array();
        $_SESSION['panier']['qteproduit']=array();
        $_SESSION['panier']['prixproduit']=array();
        $_SESSION['panier']['verrou']=false;
        

    }

    return true;

}

function ajouterproduit($libelleproduit,$qteproduit,$prixproduit){

    if(creationPanier() && !isverouille()){

        $position_produit = array_search($libelleproduit,$_SESSION['panier']['libelleproduit']);

        if($position_produit !== false){

            $_SESSION['panier']['libelleproduit'][$position_produit] += $qteproduit;
        }

        else{
            array_push($_SESSION['panier']['libelleproduit'],$libelleproduit);
            array_push($_SESSION['panier']['qteproduit'],$qteproduit);
            array_push($_SESSION['panier']['prixproduit'],$prixproduit);
        }

    } else {

        echo 'erreur veuillezcontacter admin';
    }
}


function modifierqteproduit($libelleproduit,$qteproduit){

    if(creationPanier() && !isverouille()){

        if($qteproduit>0){
            $position_produit = array_search($_SESSION['panier']['libelleproduit'],$libelleproduit);

            if($position_produit!==false){

                $_SESSION['panier']['produit'][$position_produit] = $qteproduit;


            }


        } else{ supprimerproduit($libelleproduit);

        }
    } else {
        echo'veuilleze ocntner';
    }



}



function isverouille(){
    
    if(isset($_SESSION['panier']) && $_SESSION['isverouille']){

        return true;

    } else {

        return false;
    }
}


function compterarticles(){
    if(isset($_SESSION['panier'])){

        return count($_SESSION['panier']['libelleproduit']);

    }
}

function supprimerpanier(){

    if(isset($_SESSION['panier'])){
        unset($_SESSION['panier']);
    }

}

function prixtotal(){
    $total=0;

    for($i;$i<count($_SESSION['panier']['libelleproduit']);$i++){
        $total+= $_SESSION['panier']['qteproduit'][$i]*$_SESSION['panier']['prixproduit'];
    }
    return $total;
}
function supprimerproduit($libelleproduit){

    if(creationPanier() && !isverouille()){

        $tmp=array();
        $tmp['libelleproduit']=array();
        $tmp['qteproduit']=array();
        $tmp['prixproduit']=array();
        $tmp['verrou']= $_SESSION['panier']['verrou'];

        for($i=0;$i<count($_SESSION['panier']['libelleproduit']);$i++){

            if($_SESSION['panier']['libelleproduit'][$i !== $libelleproduit]){

            array_push($_SESSION['panier']['libelleproduit'],$_SESSION['panier']['libelleproduit'][$i]);
            array_push($_SESSION['panier']['qteproduit'],$_SESSION['panier']['qteproduit'][$i]);
            array_push($_SESSION['panier']['prixproduit'],$_SESSION['panier']['prixproduit'][$i]);

            }
        }

        $_SESSION['panier']=$tmp;
        unset($tmp);
    } else {
        echo'ma bite';
    }

    }
?>