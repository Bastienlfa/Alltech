<body>
<html lang="fr">
    <form action="inscription.php" method="post" onsubmit="return(valider())" name="myform">
        <div>
            <label for="name">Nom de la société :</label>
            <input type="text" id="denom" name="denom">
        </div>
        <div>
            <label for="pren">Identifiant :</label>
            <input type="text" id="iden" name="iden">
        </div>
        <div>
            <label for="pass">mot de passe :</label>
            <input type="password" id="mdp" name="mdp">
        </div>
        <div>
            <label for="confpassword">confirmez mot de passe :</label>
            <input type="password" id="cmdp" name="cmdp">
        </div>
        <div>
            <label for="langue">Votre pays :</label>
            <select name="pays" id="pays">
                        <option value="france">France</option>
                        <option value="allemagne">Allemagne</option>
                        <option value="belgique">Belgique</option>
                        <option value="espagne">Espagne</option>
                        <option value="italie">Italie</option>
                               
             </select>
        </div>

        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="mail">
        </div>
        <div>
            <label for="confmail">confirmez votre e-mail :</label>
            <input type="email" id="cmail" name="cmail">
        </div>
       

        <div>
            <label for="statut">Type de société :</label>
            <select name="statut" id="statut">
                        <option value="franchise">Franchise</option>
                        <option value="fournisseur">Fournisseur</option>                 
             </select>
        </div>

        <div>
            <label for="numsoc">Entrez votre numéro d'affiliation :</label>
            <input type="number" id="numsoc" name="numsoc">
        </div>
        <div class="button">
            <button type="submit" value="add">Envoyer le formulaire</button>
        </div>

    </form>
    <script type="text/javascript" src="envoyer.js"></script>
</body>
</html>


<?php



if (isset($_POST['denom']) AND !empty($_POST['denom']) AND
    isset($_POST['cmdp']) AND !empty($_POST['cmdp']) AND 
    isset($_POST['iden']) AND !empty($_POST['iden']) AND 
    isset($_POST['mdp']) AND !empty($_POST['mdp']) AND 
    isset($_POST['mail']) AND !empty($_POST['mail']) AND
    isset($_POST['cmail']) AND !empty($_POST['cmail']) AND
    isset($_POST['numsoc']) AND !empty($_POST['numsoc'])) 
    
{


try {

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=alltech','root','');
    $nom=$_POST['denom'];
    $pays=$_POST['pays'];
    $identifiant=$_POST['iden'];
    $mdp=$_POST['mdp'];
    $cmdp=$_POST['cmdp'];
    $mail=$_POST['mail'];
    $cmail=$_POST['cmail'];
    $statut=$_POST['statut'];
    $affil=$_POST['numsoc'];


    $comp = "SELECT affiliation FROM societe WHERE statut='$statut' and denomination='$nom'"; 
    $reponse= $bdd->query($comp);
    $donnees = $reponse->fetch();


   
       if ($donnees['affiliation'] == $affil AND isset($affil)) // Acces OK 
       { 



          $insc="UPDATE societe SET mail = '$mail', pays = '$pays' WHERE affiliation = '$affil'";
          $c="INSERT INTO compte (identifiant,mdp) VALUE ('$identifiant', '$mdp')"; 
          $reqinsc= $bdd->query($c);
          $reqc= $bdd->query($insc);
          echo'vous etes enregistré'; 
          
          
       }       
    
    
       else {
    

        echo'mauvais numero d affiliation';
           
           
       }
       }


catch (PDOException $e) {

        echo 'Connexion échouée : ' . $e->getMessage();
    }


}

?>
