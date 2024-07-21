<!-- PARTIE VUE, fichier "filtre.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Filtrer en donnant les critères souhaités</div>
<div class="menu_filtre">
    <form action="" method="post">
        
        <input type="text" id="nom" name="nom" placeholder="Par nom"><br>
        
        
        <input type="text" id="email" name="email"placeholder="Par e-mail"><br>
        
        
        <input type="text" id="adresse" name="adresse"placeholder="Par adresse"><br>
        
        
        <input type="text" id="numero" name="numero"placeholder="Par numéro"><br>
        
        <div class="radio-group">
        <input type="radio" id="masculin" name="sexe" value="Masculin" >
        <label for="masculin">Masculin</label>
        <input type="radio" id="feminin" name="sexe" value="Féminin" >
        <label for="feminin">Féminin</label>
    </div>
    
    <div class="radio-group">
        <input type="radio" id="actif" name="statut" value="Actif" >
        <label for="actif">Actif</label>
        <input type="radio" id="inactif" name="statut" value="Inactif" >
        <label for="inactif">Inactif</label>
    </div>
        
        <input type="submit" name="filtrer" value="Filtrer (ou annuler le filtre)"><br>
    </form>
</div>

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
