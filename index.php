<?php 
session_start();
require_once('./views/header.php');
require_once('./model/connect.php');
require_once('./controller/controller.php');

if (isset($_POST['seconnecter'])) { 
    
    $login = $_POST['login']; 
    $password = $_POST['password']; 

    $y = new controller;
    $var = $y->checklogin($login,$password);
    if ( strlen($var) > 0 )
    {
        if ($var == "Directeur"){
            require_once('./views/directeur/index.php');
        }
        elseif ($var == "Conseiller"){
            require_once('./views/conseiller/index.php');
        }
        elseif ($var == "Agent"){
            require_once('./views/agent/index.php');
        }
    }
    else {
        echo "Login ou mot de passe incorrect";
    }
    

}
elseif (isset($_POST['employe'])){
    require('./views/directeur/employe.php');
}


elseif (isset($_POST['type_compte'])) {
    require_once('./views/directeur/type_compte.php');
}

elseif (isset($_POST['creer_employe'])) {

    $nom = $_POST['nom'];
    $login = $_POST['login']; 
    $password = $_POST['password'];
    $categorie = $_POST['categorie']; 

    $x = new controller;
    $var = $x->addUser($nom,$login,$password,$categorie);
    require_once('./views/directeur/employe.php');
}

elseif (isset($_POST['rechercher'])) {
    require_once('./views/directeur/employe.php');
    
    $num = $_POST['num_emplye'];

    $x = new controller;
    $var = $x->affiche_recherche($num);
    
}

elseif (isset($_POST['modifier'])) {
    
    $num = $_POST['val_numero'];
    $login = $_POST['val_login']; 
    $password = $_POST['val_password'];

    $x = new connect;
    $var = $x->modifUser($num,$login,$password);

    require_once('./views/directeur/employe.php');

}


elseif (isset($_POST['creer_compte'])) {
    require_once('./views/directeur/type_compte.php');
    
    $nom_compte = $_POST['nom_compte'];

    $x = new connect;
    $var = $x->addcompte($nom_compte);
    
}


elseif (isset($_POST['afficher_compte'])) {
    require_once('./views/directeur/type_compte.php');
    
    $x = new controller;
    $var = $x->afficher_compte();
}

elseif (isset($_POST['supprimer'])) {
    require_once('./views/directeur/type_compte.php');

    if (isset($_POST['checked'])) {
        $checkedvals = $_POST['checked'];
        $values = '';
        foreach($checkedvals as $val ) 
        {
            $values .= "'" . $val . "',";   //'val1','val2'
        }
        $values = rtrim($values, ',');
        echo $values;
        $x = new connect;
        $var = $x->supprimer($values);
    }
    
}


else {
    require_once('./views/accueil/index.php');
}



require_once('./views/footer.php');
