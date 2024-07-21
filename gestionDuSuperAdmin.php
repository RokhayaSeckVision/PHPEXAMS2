
<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<?php
require_once 'connexion.php';
require_once './modele/connexions.php';
require_once './controleur/controleurConnexions.php';
require_once './modele/user.php';
require_once './modele/superAdmin.php';
require_once './controleur/controleur.php';
require_once './controleur/superAdminControleur.php';
global $connect;
// sachant que le super admin peut avoir les mêmes activitée que l'admin on crée 2 objets qui le représenteront
$connexions = new Connexions($connect);
$controleurConnexions =  new ControleurConnexions ($connexions,$connect);


session_start();

$superAdminInfos = $connexions->getUser($_SESSION["idSuperAdmin"]);
$superAdmin = new User($_SESSION["idSuperAdmin"],$superAdminInfos["prenom"],$superAdminInfos["nom"],$superAdminInfos["email"],$superAdminInfos["numero"],$superAdminInfos["pwd"], "super admin", $connect);
$controleurSuperAdmin = new Controleur($superAdmin,$connect);
//var_dump($superAdmin);
//$controleurSuperAdmin->modifierClient();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'ajouterAdmin':
            $controleurSuperAdmin->ajouterAdmin();
            break;
        case 'ajouterClient':
            $controleurSuperAdmin->ajouterClient();
            break;
        case 'modifierClient':
            $controleurSuperAdmin->modifierClient();
            
            break;
        case 'listerClients':
            $controleurSuperAdmin->afficherTousLesClients();
            break;
        case 'listerAdmins':
                $controleurSuperAdmin->afficherTousLesAdmins();
                break;
        case 'filterClients':
            $controleurSuperAdmin->filtrer();
            break;
        case 'trieParNom':
            $controleurSuperAdmin->afficherClientsTries();
            break;
        case 'archiverClient':
            $controleurSuperAdmin->appliquerArchivage();
            break;
        case 'archiverAdmin':
            $controleurSuperAdmin->appliquerArchivageAdmin();
            break;
        case 'archives':
            $controleurSuperAdmin->afficherArchives();
            break;
        case 'imprimer':
            $controleurSuperAdmin->exporterCSV();
            break;
        case 'rapport':
            $controleurSuperAdmin->genererRapport();
            break;
        default:
            echo 'Action inconnue';
            break;
    }
} else {
echo "<div class='titre'>Veuillez sélectionner une action parmi les suivantes : </div><br>";
echo "<div class='menu_admin'>"   ;
echo '<a href="?action=ajouterAdmin">Ajouter un admin</a><br>';
echo '<a href="?action=ajouterClient">Ajouter un client</a><br>';
echo '<a href="?action=modifierClient">Modifier un client</a><br>';
echo '<a href="?action=listerClients">Afficher tous les Clients</a><br>'; 
echo '<a href="?action=listerAdmins">Afficher tous les admins</a><br>'; 
echo '<a href="?action=filterClients">Filtrer les clients</a><br>';
echo '<a href="?action=trieParNom">Trier les clients par nom</a><br>';
echo '<a href="?action=archiverClient">Archiver un client</a><br>';
echo '<a href="?action=archiverAdmin">Archiver un admin</a><br>';
echo '<a href="?action=archives">Voir les archives</a><br>';
echo '<a href="?action=imprimer">Imprimer une liste de clients</a><br>';
echo '<a href="?action=rapport">Rapport</a><br>';
echo "</div>"   ;

}




?>



<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>