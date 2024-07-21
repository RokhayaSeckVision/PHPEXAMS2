<!-- PARTIE VUE, fichier "allClient.php" -->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<div class="titre">Liste des admins</div>
<table border ='1'>
    <tr>
        <td>ID</td>
        <td>PRENOM </td>
        <td>NOM</td>
        <td>E-MAIL</td>
        <td>NUMERO</td>
        <td>STATUT</td>
    </tr>
    <?php foreach ($admins as $admin): ?>
    <tr>
        <td><?php echo htmlspecialchars($admin['id']); ?></td>
        <td><?php echo htmlspecialchars($admin['prenom']); ?></td>
        <td><?php echo htmlspecialchars($admin['nom']); ?></td>
        <td><?php echo htmlspecialchars($admin['email']); ?></td>
        <td><?php echo htmlspecialchars($admin['numero']); ?></td>
        <td><?php echo htmlspecialchars($admin['statut']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>
