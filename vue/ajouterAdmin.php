<?php ob_start(); ?> <!--Pour lancer l'enregitrement du contenu de cette page-->
<?php

//page VUE , "ajouterAdmin.php"
//CETTE PAGE NE SERA PAS ACCESSIBLE AUX ADMINS simples

?>
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Inscrire un admin</div>



<div class="formulaire"> 
    <fieldset>
        
        <form action="" method="post" class="formulaire">
            <input type="text" name="prenom" placeholder="Prenom" required> <br>
            <input type="text" name="nom" placeholder="Nom" required> <br>
            <input type="text" name="email" placeholder="E-mail" required> <br>
            <input type="text" name="numero" placeholder="Numéro" required> <br>
            <input type="password" name="pwd" placeholder="Mot de passe" required> <br>
            <label for="statut">Statut :</label><br>
            <input type="radio" id="super_admin" name="statut" value="super admin" required>
            <label for="super_admin">Super Admin</label><br>
            <input type="radio" id="admin" name="statut" value="admin" required>
            <label for="admin">Admin</label><br>
            <button type="submit" name="envoyer" class="bouton">Envoyer</button>
        </form>
    </fieldset>
</div>

<?php 
    $contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
    require_once "template.php";
?>
