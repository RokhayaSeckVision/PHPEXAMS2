<!-- rapport sur un client-->
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>
<?php
require_once 'connexion.php';
global $connect;
session_start();
 


?>
<div class="titre">Rapport sur le client : <?php echo $_SESSION["clientnom"]; ?></div>
<div class="rapport_sur_client">
    <p>Client N° <?php echo $_SESSION["clientid"]; ?> :</p>
    <p>
        <strong>Nom :</strong> <?php echo $_SESSION["clientnom"]; ?><br>
        <strong>Sexe :</strong> <?php echo $_SESSION["clientsexe"] ; ?><br>
        <strong>Adresse :</strong> <?php echo $_SESSION["clientadresse"]; ?><br>
        <strong>Statut :</strong> <?php echo $_SESSION["clientstatut"] ?><br>
    </p>
    <p>Contacts :</p>
    <p>
        <strong>E-mail :</strong> <?php echo $_SESSION["clientemail"]; ?><br>
        <strong>Numéro de téléphone :</strong> <?php echo $_SESSION["clientnum"]; ?>
    </p>
</div>


</div>

<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>