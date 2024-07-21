<!-- PARTIE VUE, fichier "archives.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Archives</div>
<table border ='1'>
    <tr>
        <td>ID</td>
        <td>PRENOM & NOM</td>
        <td>E-MAIL</td>
        <td>NUMERO</td>
        <td>STATUT</td>
        
    </tr>
    <?php foreach ($archives as $archive): ?>
    <tr>
        <td><?php echo htmlspecialchars($archive['id']); ?></td>
        <td><?php echo htmlspecialchars($archive['nom']); ?></td>
        <td><?php echo htmlspecialchars($archive['email']); ?></td>
        <td><?php echo htmlspecialchars($archive['numero']); ?></td>
        <td><?php echo htmlspecialchars($archive['statut']); ?></td>

    </tr>
    <?php endforeach; ?>
</table>
<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>
