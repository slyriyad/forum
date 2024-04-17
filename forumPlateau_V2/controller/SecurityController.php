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
                "meta_description" => "aze",
                ];
    }   
            
            

    // public function addRegister() {
    //     // créer une nouvelle instance de categoryManager
    //     $userManager = new UserManager();
    //     if (isset($_POST['add'])) {

    //         $nickName = filter_input(INPUT_POST,"nickName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //         $mail = filter_input(INPUT_POST,"mail", FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
    //         $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //         $password2 = filter_input(INPUT_POST,"password2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //         $role = 'user';
    //         $registrationDate = date_default_timezone_set('Europe/Paris');
    //         $registrationDate = date("Y-m-d H:i:s");
            
    //         if($nickName && $mail && $password1 && $password2){
    //             var_dump("ok");die;
    //         }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
    //         // $data = [
    //         //     'nickName' => $nickName,
    //         //     'mail' => $mail,
    //         //     'password' => $password,
    //         //     'role' => $role,
    //         //     'registrationDate' => $registrationDate
    //         // ];

    //         // $categories = $userManager->add($data);
            
    //     }
    //         return [
    //             "view" => VIEW_DIR."",
    //             "meta_description" => "",
    //             "data" => [
    //                 ]
    //             ];
    //         }      
    
    
    
    
    
    
    
    
    
    public function login () {}
    public function logout () {}
}
