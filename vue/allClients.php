<!-- PARTIE VUE, fichier "allClient.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Liste des clients</div>
<button onclick="window.print()">Imprimer</button> <!-- Bouton pour imprimer -->



<table border ='1'>
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
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>
