<?php
// On lance la session

$title = "Page d'accueil";

?>      

<section class="hero">
    <h1>Accueil Banque</h1>
</section>
<fieldset id="fieldset_connexion" >
    <?php if(isset($_GET['error']) == 1) {      // o5n affiche l'erreur s'il y en a 
        echo '<p id="erreur_connexion"> Erreur de connexion </p>';
    }
    ?>
    <legend>Connexion</legend>
    <form method="post" action="index.php">
        <p>
            <label> Login: </label>
            <input type="text" id="login" name="login" required /> 
        </p>

        <p>
            <label> Password: </label>
            <input type="password" id="password" name="password" required />
        </p>
        <p>
            <div class="connexion_field">
            <button type="submit" name="seconnecter" class="button"> Se connecter</button>

            </div>
            
        </p>
    </form>
</fieldset>
         
