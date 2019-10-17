function valider(){
    var denom = document.myform.denom.value;
    var identifiant = document.myform.iden.value;
    var mail = document.myform.mail.value;
    var confirmationmail = document.myform.cmail.value;
    var motdepasse = document.myform.mdp.value;
    var cmotdepasse = document.myform.cmdp.value;
    var affil = document.myform.numsoc.value;

    
    if (denom == "") {
        alert("Veuillez saisie la nom de votre societe")
        return false;
    }

    if (identifiant == "") {
        alert("Veuillez entrer un identifiant")
        return false;
    }

    if (confirmationmail == "") {
        alert("Veuillez saisir une adresse mail de confirmation")
        return false;
    }
    if (mail == "") {
        alert("Veuillez saisir votre adresse mail")
        return false;
    }

    if (mail != confirmationmail) {
        alert("Les deux adresses mails sont differentes")
        return false
    }

    if (motdepasse == "") {
        alert("Veuillez saisir une mot de passe")
        return false;
    }

    if (cmotdepasse == "") {
        alert("Veuillez saisir le mot de passe de confirmation")
        return false;
    }

    if (motdepasse != cmotdepasse) {
        alert("Mauvaise confirmation mot de passe ")
        return false;
    } else return true;



}

function validercon() {
    var idcon = document.myformcon.idcon.value;
    var mdpcon = document.myformcon.mdpcon.value;


    if (idcon == "") {
        alert("Veuillez entrer votre identifiant")
        return false;
    }

    if (mdpcon == "") {
        alert("Veuillez entrer votre mot de passe")
        return false;
    }

}