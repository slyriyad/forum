<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use App\Session;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register() {
            return [
                "view" => VIEW_DIR."security/register.php",
                "meta_description" => "register",
                ];
    }     
            
            

    public function addRegister() {
        // créer une nouvelle instance de categoryManager
        $userManager = new UserManager();
        if (isset($_POST['add'])) {

            $nickName = filter_input(INPUT_POST,'nickName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mail = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST,'password2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = 'user';
            $registrationDate = date_default_timezone_set('Europe/Paris');
            $registrationDate = date("Y-m-d H:i:s");
            
            if($nickName && $mail && $password && $password2){
                $requete = $userManager->findOneByMail($mail);

                if($requete){
                    header("Location: index.php?ctrl=security&action=register");exit;
                } else {
                    if($password == $password2 && strlen($password)>=5){
                    
                        $data = [
                            'nickName' => $nickName,
                            'mail' => $mail,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'role' => $role,
                            'registrationDate' => $registrationDate
                        ];

                        $user = $userManager->add($data);
                        header("Location: index.php?ctrl=security&action=login");exit;
                    }
                }
            }
        }
            return [
                "view" => VIEW_DIR."security/register.php",
                "meta_description" => "",
                ];
            }      
    
    
    
    
    
    
    
    
    
    public function login () {
        $userManager = new UserManager();
        if (isset($_POST['connexion'])) {
            // filtrer les champs
            $mail = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            // si les filtres sont valides
            if($mail && $password){
                $user = $userManager->findOneByMail($mail);
                // est-ce que l'utlisateur existe
                if($user){
                    $hash = $user->getPassword();
                    if(password_verify($password, $hash)){
                        Session::setUser($user);
                        $this->redirectTo("home", "home");

                 
                    } else {
                        // header("Location: index.php?ctrl=security&action=login");exit;
                        //  message utilisateur inconnu ou mdp incorrect
                        var_dump("no");die;
                    }
                } else{
                    //  message utilisateur inconnu ou mdp incorrect
                }
            }
        }


        
        return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "login",
            ];
    }
    public function logout () {
        // Je retire les informations user de la session.
        unset($_SESSION["user"]);

        $this->redirectTo("index", "home");
    }
}
