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
    $superAdmin = new User($_SESSION["idSuperAdmin"],$superAdminInfos["prenom"],$superAdminInfos["nom"],$superAdminInfos["email"],$superAdminInfos["numero"],$superAdminInfos["pwd"], "super admin", $connect);
    $controleurSuperAdmin = new Controleur($superAdmin,$connect);   
    
    

    

    // Affichage des informations du client dans des balises <div>
    echo "<div class='profile-info'>";
    echo '<div class="titre">Profil</div>';
    echo "<div><strong>Prénom:</strong>". $superAdmin->getPrenom()."</div>";
    echo "<div><strong>Nom:</strong>". $superAdmin->getNom()."</div>";
    echo "<div><strong>Email:</strong>". $superAdmin->getEmail()."</div>";
    echo "<div><strong>Numéro de téléphone:</strong> ".$superAdmin->getNumero()."</div>";
    echo "<div><strong>Statut:</strong> ".$superAdmin->getStatut()."</div>";
    echo "</div>";

    // Formulaire pour modifier les informations de l'admin
    echo "<div class='profile-form'>";
    
    
    echo '<div class="titre">Paramètes</div>';
    echo "<form action='modifierAdmin.php' method='post' class='formulaire'>";
    echo "<div><input type='text' id='prenom' name='prenom' placeholder ='Prenom'></div>";
    echo "<div><input type='text' id='nom' name='nom'  placeholder ='Nom'></div>";
    echo "<div><input type='text' id='email' name='email'placeholder ='Email'></div>";
    echo "<div><input type='text' id='numero' name='numero' placeholder ='Numéro'></div>";
    echo "<div><input type='password' id='pwd' name='pwd' placeholder ='Mot de passe'></div>";
    echo "<div><button type='submit' name = 'modifier'>Enregistrer les modifications</button></div>";
    echo "</form>";
    echo "</div>";

?>



<?php 
$contenu = ob_get_clean(); //pour mettre le contenu dans la variable $contenu qui se trouve dans main
require_once "template.php";
?>