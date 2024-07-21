<?php ob_start(); ?> <!--Pour lancer l'enregistrement du contenu de cette page-->


<div class="formulaire"> 
    <fieldset>
        <legend>Se connecter</legend>
        <form action="" method="post" class="formulaire">
            <input type="text" name="email" placeholder="E-mail" required> <br>
            <input type="password" name="pwd" placeholder="Mot de passe" required> <br>
            <button type ="submit" name="envoyer" >Envoyer</button>
        </form>
    </fieldset>
</div>

<?php 
    $contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
    require_once "template.php";
?>
