<!-- PARTIE VUE, fichier "ajouterClient.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Inscrire un client</div>



<form action="" method="post" class="formulaire">
    <input type="text" name="nom" placeholder="Prenom & Nom"> <br>
    <input type="text" name="email" placeholder="E-mail"> <br>
    <input type="text" name="adresse" placeholder="Adresse"> <br>
    <input type="text" name="numero" placeholder="Numéro"> <br>
    
    <div class="radio-group">
        <input type="radio" id="masculin" name="sexe" value="Masculin" required>
        <label for="masculin">Masculin</label>
        <input type="radio" id="feminin" name="sexe" value="Féminin" required>
        <label for="feminin">Féminin</label>
    </div>
    
    <div class="radio-group">
        <input type="radio" id="actif" name="statut" value="Actif" required>
        <label for="actif">Actif</label>
        <input type="radio" id="inactif" name="statut" value="Inactif" required>
        <label for="inactif">Inactif</label>
    </div>
    
    <button type="submit" name="envoyer" class="bouton">Envoyer</button>
</form>

<div class="message_de_reussite"><?$messageDeReussite?></div>

<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>
