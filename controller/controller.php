<?php
class controller extends connect
{
    public function checklogin($login,$password)
    {   
        try {
            $user = new connect;
            //$nom = $user->checkUser($login,$password)[0]->nom;
            //$login = $user->checkUser($login,$password)[0]->login;
            //$mdp = $user->checkUser($login,$password)[0]->mdp;
            $trouver = $user->checkUser($login,$password);
            if ( isset($trouver) && sizeof($trouver) > 0 )
            {
                $categorie = $trouver[0]->categorie;
                return $categorie;
            }
            
        }
        catch (Exception $e){
            
        }
        return "";
    }


    public function affiche_recherche($num)
    {
        if (strlen($num) >  0) {
            $user = new connect;
            $numero = $user->recherche($num)[0]->numEmploye;
            $nom = $user->recherche($num)[0]->nom;
            $login = $user->recherche($num)[0]->login;
            $password = $user->recherche($num)[0]->mdp;
            $categorie = $user->recherche($num)[0]->categorie;
        

            echo "<fieldset> <legend>Données de l'employé:</legend>
                <form method='post' action=''>";
                
            echo "<p> 
            <label> Numero de l'employe:</label>
            <input type='text' id='val_nombre' name='val_nombre' value='$numero' disabled='disabled' />
            <input type='hidden' id='val_numero' name='val_numero' value='$numero'/> 
            </p>";

            echo "<p> 
            <label > Nom: </label>
            <input type='text' id='val_nom' name='val_nom' value='$nom' disabled='disabled'/> 
            </p>";

            echo "<p> 
            <label > Login: </label>
            <input type='text' id='val_login' name='val_login' value='$login' /> 
            </p>";

            echo "<p>  <label > Mot de Passe: </label>
            <input type='text' id='val_password' name='val_password' value='$password' /> 
            </p>";

            echo "<p>  
            <label > Categorie: </label>
            <input type='text' id='val_categorie' name='val_categorie' value='$categorie' disabled='disabled'/> 
            </p>";

            echo "<button type='submit' class='button' name='modifier' > Modifier </button>";

            echo "</form></fieldset>";
        }

    }
    public function afficher_compte(){
        $compte = new connect;
        $var = $compte->recherche_compte();
        $nombre_requete = $compte->nombre_compte()[0];
        $total = count((array)$var);
        $noms = array();
        $i = 0;
        echo ' <fieldset><legend> Nom de Types de comptes</legend><form method="post" action=""> ';
        while($i < $total){
            $a = $var[$i]->nomTypeCompte;
            
            echo '<p> <label  > ' . $a . ': <input name="checked[]" type="checkbox" value="' . $a . '"/> </label> </p>';
            $i+=1;
        }
        echo "<button type='submit' class='button' name='supprimer' > Supprimer </button>";
        echo "</form></fieldset>";
        return $noms;
    }



}