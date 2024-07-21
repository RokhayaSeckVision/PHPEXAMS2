<?php
//CLASSE DU SUPER ADMIN
require_once "Functions.php";
require_once "connexion.php";
require_once "personne.php";
require_once "user.php";
class SuperAdmin extends User {
    public function __construct($id, $prenom, $nom, $email, $numero, $statut, $pwd, $connect) {
        parent::__construct($id, $prenom, $nom, $email, $numero, $statut, $pwd, $connect);
    }

   



    
        // Méthode pour désactiver un client
        public function desactiverClient($emailClient) {
            $statut = "inactif";
            // Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE addclient SET statut = :statut WHERE email = :email");
            $rqt->bindParam(':statut', $statut);
            $rqt->bindParam(':email', $emailClient);
            $rqt->execute();
        }
    
        // Méthode pour supprimer un client
        public function supprimerClient($emailClient) {
            // Supprimer dans la base de l'admin
            $rqt = $this->connect->prepare("DELETE FROM addclient WHERE email = :email");
            $rqt->bindParam(':email', $emailClient);
            $rqt->execute();
            //supprimer de la table client
            $rqt = $this->connect->prepare("DELETE FROM client WHERE email = :email");
            $rqt->bindParam(':email', $emailClient);
            $rqt->execute();
    
        }
    
        //SETTERS PARAMETRE DE ADMIN
        public function setNom($nom){
            $this->nom = $nom;
            //Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE administrateur SET nom = :nom WHERE id = :id");
            $rqt->bindValue(':nom', $this->nom);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
        }
        
        public function setPrenom($prenom){
            $this->prenom = $prenom;
            //Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE administrateur SET prenom = :prenom WHERE id = :id");
            $rqt->bindValue(':prenom', $this->prenom);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
        }
        
        public function setEmail($email){
            $this->email = $email;
            //Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE administrateur SET email = :email WHERE id = :id");
            $rqt->bindValue(':email', $this->email);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
        }
        
        public function setNumero($numero){
            $this->numero = $numero;
            //Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE administrateur SET numero = :numero WHERE id = :id");
            $rqt->bindValue(':numero', $this->numero);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
        }
        
        public function setPwd($pwd){
            $this->pwd = $pwd;
            //Modifier dans bd
            $rqt = $this->connect->prepare("UPDATE administrateur SET pwd = :pwd WHERE id = :id");
            $rqt->bindValue(':pwd', $this->nom);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
        }
        
    
    
        //GETTERS
    
    public function getNom(){
        $req = "SELECT nom FROM users WHERE id = :id";
            $rqt = $this->connect->prepare($req);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
            $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return  $resultat['nom'];
            } else {
                return 0; 
            }
        
    }
    
    public function getPrenom(){
        $req = "SELECT prenom FROM users WHERE id = :id";
            $rqt = $this->connect->prepare($req);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
            $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return  $resultat['prenom'];
            } else {
                return 0; 
            }
        
    }
    
    public function getEmail(){
        $req = "SELECT email FROM users WHERE id = :id";
            $rqt = $this->connect->prepare($req);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
            $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return  $resultat['email'];
            } else {
                return 0; 
            }
        
    }
    
    public function getNumero(){
        $req = "SELECT numero FROM users WHERE id = :id";
            $rqt = $this->connect->prepare($req);
            $rqt->bindValue(':id', $this->id);
            $rqt->execute();
            $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return  $resultat['numero'];
            } else {
                return 0; 
            }
        
    }
    
    public function getPwd(){
        $req = "SELECT pwd FROM administrateur WHERE id = :id";
        $rqt = $this->connect->prepare($req);
        $rqt->bindValue(':id', $this->id);
        $rqt->execute();
        $resultat = $rqt->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['pwd'];
        } else {
            return 0; 
        }
    
    }
    
}

