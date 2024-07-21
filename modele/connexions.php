<?php 
//page connexions.php
//cette classe gère les inscriptions et connexions des utilisateurs (super admin et admin)
require_once 'Functions.php';
class Connexions {
    protected $connect ;
    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function getUser($id){
        $rqt = $this->connect->prepare("SELECT * FROM users WHERE id = :id ");
        $rqt->execute([":id"=>$id]);
        return $rqt->fetch();
    }

   //cette methode gère l'autentification du super admin 
   public function connexionSuperAdmin($data){
    session_start();
    $email = correctValue($data["email"]);
    $pwd = correctValue($data["pwd"]);

    // Vérifiez si l'utilisateur existe
    $rqt = $this->connect->prepare("SELECT * FROM users WHERE email = :email");
    $rqt->bindParam(':email', $email);
    $rqt->execute();
    $user = $rqt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // Vérifier si le mot de passe soumis correspond au mot de passe haché stocké dans la base de données
        if(password_verify($pwd, $user['pwd'])) {
            // Authentification réussie
            $_SESSION['idSuperAdmin'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session
            return $_SESSION['idSuperAdmin'];
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect";
        }
    } else {
        // Utilisateur non trouvé avec cet email
        echo "Aucun utilisateur trouvé avec cet email";
    }
}


}

