<?php

class connect
{
  public $pdo;
  public $host = 'localhost';
  public $user = 'root';
  public $pass = '';
  public $dbname = 'sprint2';

  
  public function __construct($db_name = 'sprint2', $db_user = 'root', $db_pass = '', $db_host = 'localhost')
  {
      $this->dbname = $db_name;
      $this->user = $db_user;
      $this->pass = $db_pass;
      $this->host = $db_host;
  }

  // On se connecte a la base de donnée
  protected function getPDO()
  {
      // Si on n'est pas encore connecté, on se connecte, sinon on renvoie juste pdo pour éviter de faire pleins de connexions
      if($this->pdo === null){ 
        
          try {
              $pdo = new PDO('mysql:dbname=sprint2;host=localhost', 'root', '', [
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affichage d'erreur
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ // Les valeurs renvoyés d'une requete sont sous forme d'objets
              ]);
              $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
              $this->pdo = $pdo;
          } catch(Exception $e){
              echo 'Error : ' . $e->getMessage() . '<br/>';
              echo 'Numero : ' . $e->getCode();
          }

      }
      return $this->pdo;
  }

  public function checkUser($login,$password){ // On recupere le statut de la personne qui se connecte
    $requete="select nom, login, mdp, categorie from Employe where login='$login' and mdp='$password';";
    $resultat=$this->getPDO()->prepare($requete); 
    $resultat->execute();
    return $resultat->fetchAll(PDO::FETCH_OBJ);  // penser à gérer cas ids incorrectes'
    }



    public function addUser($nom,$login,$password,$categorie) {
        try {
            if (strlen($nom) > 0 && strlen($login) > 0 && strlen($password) > 0 && strlen($categorie) > 0 ) {
                $requete="INSERT INTO 
                Employe(nom,login,mdp,categorie)
                VALUES (:nom,:login,:mdp,:categorie)";
                $resultat=$this->getPDO()->prepare($requete); 
                $resultat->execute([
                    ':nom' => $nom,
                    ':login' => $login,
                    ':mdp' => $password,
                    ':categorie' => $categorie
                ]);
            }
            else {
                echo "Tous les chmaops doivent etre remplis";
            }
        }
        catch (Exception  $e){
            $e = "Login deja existant";
            echo $e;
        }
        
    }

    public function recherche($num){ // On cherche le nom de l'employe depuis son numero
        $requete="select * from Employe where numEmploye='$num';";
        $resultat=$this->getPDO()->prepare($requete); 
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);  
    }

    public function modifUser($num,$login,$password) {
        $requete="UPDATE `Employe` SET `login`='$login',`mdp`='$password' WHERE `numEmploye`='$num';" ;
        $resultat=$this->getPDO()->prepare($requete);
        $resultat->execute();
    }

    public function addcompte($nom_compte)
    {
        try {
            if (strlen($nom_compte) > 0) {
                $requete="INSERT INTO `TypeCompte` (`numTypeCompte`, `nomTypeCompte`) VALUES ('0', '$nom_compte');";
                $resultat=$this->getPDO()->prepare($requete); 
                $resultat->execute();
            }
        }
        catch (Exception  $e){
            $e = "Nom de compte deja existant";
            echo $e;
        }
    }

    public function recherche_compte(){ // On affiche tous les noms des comptes
        $requete="SELECT `nomTypeCompte` FROM `TypeCompte`;";
        $resultat=$this->getPDO()->prepare($requete); 
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);  
    }

    public function nombre_compte(){ // On affiche tous les noms des comptes
        $requete="SELECT COUNT(`nomTypeCompte`) FROM `TypeCompte`;";
        $resultat=$this->getPDO()->prepare($requete); 
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ); 
        var_dump($resultat->fetchAll(PDO::FETCH_OBJ));
    }

    public function supprimer($values)
    {
            $requete="DELETE FROM `TypeCompte` WHERE `nomTypeCompte` in ($values);"; //'valeur1','valeur2'
            $resultat=$this->getPDO()->prepare($requete); 
            $resultat->execute();
        
    }
        
}
