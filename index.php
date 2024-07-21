<?php


// fichier "index.php"
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


$controleurConnexions->connexionSuperAdmin();

