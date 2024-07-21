<!-- PARTIE VUE, fichier "modifierClient.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Modifier un client</div>
<form action="" method="POST" class="formulaire">
    <fieldset >
        
        <input type="number" name="id_client_a_modifier"placeholder="ID Client" required><br>
        <input type="text" name="nom" placeholder="Nouveau nom"><br>
        <input type="text" name="adresse" placeholder="Nouvelle adresse"><br>
        <input type="text" name="email" placeholder="Nouvel e-mail"><br>
        <input type="text" name="numero" placeholder="Nouveau numéro"><br>
        <div class="radio-group">
        <input type="radio" id="masculin" name="sexe" value="Masculin" >
        <label for="masculin">Masculin</label>
        <input type="radio" id="feminin" name="sexe" value="Féminin" >
        <label for="feminin">Féminin</label>
    </div>
    
    <div class="radio-group">
        <input type="radio" id="actif" name="statut" value="Actif" >
        <label for="actif">Actif</label>
        <input type="radio" id="inactif" name="statut" value="Inactif">
        <label for="inactif">Inactif</label>
    </div>
        <button type="submit" name="modifier">Modifier</button>

    </fieldset>
    
</form>
<table border='1'>
    <tr>
        <td>ID</td>
        <td>PRENOM & NOM</td>
        <td>E-MAIL</td>
        <td>ADRESSE</td>
        <td>NUMERO</td>
        <td>SEXE</td>
        <td>STATUT</td>
        
    </tr>
    <?php foreach ($clients as $client): ?>
    <tr>
        <td><?php echo htmlspecialchars($client['id']); ?></td>
        <td><?php echo htmlspecialchars($client['nom']); ?></td>
        <td><?php echo htmlspecialchars($client['email']); ?></td>
        <td><?php echo htmlspecialchars($client['adresse']); ?></td>
        <td><?php echo htmlspecialchars($client['numero']); ?></td>
        <td><?php echo htmlspecialchars($client['sexe']); ?></td>
        <td><?php echo htmlspecialchars($client['statut']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php 
$contenu = ob_get_clean(); // pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>