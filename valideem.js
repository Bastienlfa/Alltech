function valideradd() {
    var nomadd = document.myformadd.nomadd.value;
    var descadd = document.myformadd.desadd.value;
    var prixad = document.myformadd.prixadd.value;

    if (nomadd == "") {
        alert("Veuillez entrer Le nom du produit")
        return false;
    }

    
    if (descadd == "") {
        alert("Veuillez entrer la description du produit")
        return false;
    }

    if (prixad == "") {
        alert("Veuillez entrer le prix du produit")
        return false;
    }
    if ( confirm( "Etes vous sure de vouloir ajouter ce produit" ) ) { return true;
        
    } else { return false
        
    }
}

function validermodif() {
    var nomodif = document.myformod.nommodif.value;
    var nomodifie = document.myformod.nommod.value;
    var descmodif = document.myformod.desmod.value;
    var prixmodif = document.myformod.prixmod.value;

    if (nomodif == "") {
        alert("Veuillez entrer Le nom du produit")
        return false;
    }

    if (nomodifie == "") {
        alert("Veuillez entrer le nouveau nom du produit")
        return false;
    }

    
    if (descmodif == "") {
        alert("Veuillez entrer la nouvelle description du produit")
        return false;
    }

    if (prixmodif == "") {
        alert("Veuillez entrer le nouveau prix du produit")
        return false;
    }
    if ( confirm( "Etes vous sure de vouloir modifier ce produit" ) ) { return true;
        
    } else { return false
        
    }
}

function validersupp() {
    var nomssup = document.myformsupp.nomsupp.value;

    if (nomssup == "") {
        alert("Veuillez entrer le nom du produit a supprimer")
        return false;
    }

    if ( confirm( "Etes vous sure de vouloir supprimer ce produit" ) ) { return true;
        
    } else { return false
            
        }
}