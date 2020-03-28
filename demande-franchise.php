
<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="demande-franchise.php">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="name" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>téléphone *</label>
            <input type="number" name="tel" class="form-control">
        </div>
        <div class="form-group">
            <label>Message *</label>
            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default submit-button">Envoyer <i class="fa fa-caret-right"></i></button>
        </div>
    </div>
</form>
<?php

if (!empty($_POST['message'])&&!empty($_POST['superficie'])&&!empty($_POST['adresse'])&&!empty($_POST['tel'])&&!empty($_POST['email'])&&!empty($_POST['name'])){

    $nameEstimation=$_POST['name'];
    $mailEstimation=$_POST['email'];
    $tel=$_POST['tel'];
    $message=$_POST['message'];

// Envoi du mail
mail('benjamin.brunois@gmail.com', 'Mon Sujet', $message,$tel);
    
    $bdd = new pdo('mysql:host=localhost;port=3308;dbname=elixir','root','');
$reqAjout= "INSERT INTO estimation(nom,mail,tel,superficie,msg,adresse) value ('$nameEstimation','$mailEstimation','$telEstimation','$superficieEstimation','$messageEstimation','$adresseEstimation')";
$req=$bdd->query($reqAjout);


// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()

        
    }
    
    else {
        echo 'impossible';
    }



    ?>
    