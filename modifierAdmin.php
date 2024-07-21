<?php ob_start(); ?> <!-- Pour lancer l'enregistrement du contenu de cette page -->
<div class="retour"><a href="profilAdmin.php">Retour</a></div>

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



if(isset($_POST["modifier"])){
    //nom
    if(isset($_POST["nom"]) && !empty($_POST["nom"])){
        $admin->setNom($_POST["nom"]);

        echo "Votre nouveau nom est ".$admin->getNom()."<br>";
    }

    if(isset($_POST["prenom"]) && !empty($_POST["prenom"])){
        $admin->setPrenom($_POST["prenom"]);
        echo "Votre nouveau prenom est ".$admin->getPrenom()."<br>";
    }

    if(isset($_POST["email"]) && !empty($_POST["email"])){
        $admin->setEmail($_POST["email"]);
        echo "Votre nouvel email est ".$admin->getEmail()."<br>";
    }

    if(isset($_POST["numero"]) && !empty($_POST["numero"])){
        $admin->setNumero($_POST["numero"]);
        echo "Votre nouveau numéro est ".$admin->getNumero()."<br>";
    }

    if(isset($_POST["pwd"]) && !empty($_POST["pwd"])){
        $admin->setPwd($_POST["pwd"]);
    }
}

?>


<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>