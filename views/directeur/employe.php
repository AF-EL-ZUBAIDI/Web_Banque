<fieldset>
    <legend>Création d'un Employe: </legend>
        <form method="post" action="">
        <p>
            <label > Nom: </label>
            <input type="text" id="nom" name="nom"/>
        </p>
        <p>
            <label > Login: </label>
            <input type="text" id="login" name="login" />
        </p>
        <p>
            <label > Mot de Passe: </label>
            <input type="password" id="password" name="password" />
        </p>
        <p>
            <label > Categorie: </label>
            <input type="text" id="categorie" name="categorie" />
        </p>
        
        <button type="submit" class="button" name="creer_employe" > Créer </button>
    </form>
</fieldset>

<fieldset>
    <legend> Recherche d'un Employe: </legend>
        <form method="post" action="">
        <p>
            <label > Numero de l'Employe: </label>
            <input type="text" id="num_emplye" name="num_emplye" 
            <?php 
            if (isset($_POST['num_emplye']) != '') {
                $val = $_POST['num_emplye'];
                echo "value='". $val . "'"; 
            }
            ?>
            />
        </p>
        
        <button type="submit" class="button" name="rechercher" > Rechercher </button>
        
    </form>
</fieldset>

        