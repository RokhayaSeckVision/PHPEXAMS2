<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="gestionDuSuperAdmin.php">Retour</a></div>

<?php
session_start();


require_once 'connexion.php';
require_once './modele/connexions.php';
require_once './controleur/controleurConnexions.php';
require_once './modele/user.php';
require_once './modele/superAdmin.php';
require_once './controleur/controleur.php';
require_once './controleur/superAdminControleur.php';
global $connect;
$connexions = new Connexions($connect);
$controleurConnexions =  new ControleurConnexions ($connexions,$connect);
$superAdminInfos = $connexions->getUser($_SESSION["idSuperAdmin"]); // Si l'admin' est connecté, il peut faire des actions
    // On récupère les données
    $admin = new User($_SESSION["idSuperAdmin"],$superAdminInfos["prenom"],$superAdminInfos["nom"],$superAdminInfos["email"],$superAdminInfos["numero"],$superAdminInfos["pwd"], "super admin", $connect);
    $controleurSuperAdmin = new Controleur($admin,$connect);


echo "Vous n'êtes pas super admin, vous ne pouvez donc pas effectuer  cette tâche.";


?>



<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>