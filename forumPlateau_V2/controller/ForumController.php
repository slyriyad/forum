<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function listCategories() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["name", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listUsers() {
        
        // créer une nouvelle instance de UserManager
        $userManager = new UserManager();
        // récupérer la liste de toutes les utilisateurs grâce à la méthode findAll de Manager.php (triés par nom)
        $users = $userManager->findAll(["nickName", "DESC"]);

        // le controller communique avec la vue "listUsers" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/listUsers.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [
                "users" => $users
            ]
        ];
    }

    public function listTopics() {
        
        // créer une nouvelle instance de TopicManager
        $topicManager = new TopicManager();
        // récupérer la liste de toutes les topic grâce à la méthode findAll de Manager.php (triés par nom)
        $topics = $topicManager->findAll(["title", "DESC"]);

        // le controller communique avec la vue "listTopics" (view) pour lui envoyer la liste des topic (data)
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topic du forum",
            "data" => [
                "topics" => $topics
            ]
        ];
    }

    public function listPosts() {
        
        // créer une nouvelle instance de postManager
        $postManager = new PostManager();
        // récupérer la liste de toutes les post grâce à la méthode findAll de Manager.php (triés par nom)
        $posts = $postManager->findAllWithAuthors(["title", "DESC"]);

        // le controller communique avec la vue "listposts" (view) pour lui envoyer la liste des post (data)
        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des post du forum",
            "data" => [
                "posts" => $posts
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function addCategory() {
        
        // créer une nouvelle instance de categoryManager
        $categoryManager = new CategoryManager();
        if (isset($_POST['add'])) {

            $nom = $_POST['name'];
            $data = [
                'name' => $nom
            ];
            // ajouter une categorie
            $categories = $categoryManager->add($data);
        }
            // le controller communique avec la vue "addCategory" (view) pour lui envoyer la liste des post (data)
            return [
                "view" => VIEW_DIR."forum/addCategory.php",
                "meta_description" => "Liste des post du forum",
                "data" => [
                    // "categories" => $categories
                    ]
                ];
    }

    public function addUser() {
        
        // créer une nouvelle instance de categoryManager
        $userManager = new UserManager();
        if (isset($_POST['add'])) {

            $nickName = $_POST['nickName'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $role = 'user';
            $registrationDate = date_default_timezone_set('Europe/Paris');
            $registrationDate = date("Y-m-d H:i:s");
            $data = [
                'nickName' => $nickName,
                'mail' => $mail,
                'password' => $password,
                'role' => $role,
                'registrationDate' => $registrationDate
            ];
            // ajouter une categorie
            $categories = $userManager->add($data);
        }
            // le controller communique avec la vue "adduser" (view) pour lui envoyer la liste des post (data)
            return [
                "view" => VIEW_DIR."forum/addUser.php",
                "meta_description" => "Liste des post du forum",
                "data" => [
                    // "categories" => $categories
                    ]
                ];
    }

    public function addTopic() {
        
        // créer une nouvelle instance de categoryManager
        $topicManager = new TopicManager();
        if (isset($_POST['add'])) {

            $title = $_POST['title'];
            $category_id = 1;
            $user_id = 1;
            $creationDate = date_default_timezone_set('Europe/Paris');
            $creationDate = date("Y-m-d H:i:s");
            $data = [
                'title' => $title,
                'creationDate' => $creationDate,
                'category_id' => $category_id,
                'user_id' => $user_id
            ];
            // ajouter une categorie
            $categories = $topicManager->add($data);
        }
            // le controller communique avec la vue "addTopic" (view) pour lui envoyer la liste des post (data)
            return [
                "view" => VIEW_DIR."forum/addTopic.php",
                "meta_description" => "Liste des post du forum",
                "data" => [
                    // "categories" => $categories
                    ]
                ];
    }

    public function addPost() {
        
        // créer une nouvelle instance de categoryManager
        $postManager = new PostManager();
        if (isset($_POST['add'])) {

            $text = $_POST['text'];
            $topic_id = 1;
            $user_id = 1;
            $creationDate = date_default_timezone_set('Europe/Paris');
            $creationDate = date("Y-m-d H:i:s");
            $data = [
                'text' => $text,
                'creationDate' => $creationDate,
                'topic_id' => $topic_id,
                'user_id' => $user_id
            ];
            // ajouter une categorie
            $categories = $postManager->add($data);
        }
            // le controller communique avec la vue "addPost" (view) pour lui envoyer la liste des post (data)
            return [
                "view" => VIEW_DIR."forum/addPost.php",
                "meta_description" => "Liste des post du forum",
                "data" => [
                    // "categories" => $categories
                    ]
                ];
    }

    public function delCategory($id) {
        
        // créer une nouvelle instance de categoryManager
        $categoryManager = new CategoryManager();
        if (isset($_POST['del'])) {
            $id = $_POST['supCat'];
            // supprimer la categorie choisie grâce à la méthode delete de Manager.php 
            $categories = $categoryManager->delete($id);
            header("location:index.php?ctrl=forum&action=listCategories");
        }

        // le controller communique avec la vue "listcategories" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des categories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function delUser($id) {
        
        // créer une nouvelle instance de UserManager
        $userManager = new UserManager();
        if (isset($_POST['del'])) {
            $id = $_POST['supUser'];
            // supprimer l'utilisateur' choisie grâce à la méthode delete de Manager.php 
            $users = $userManager->delete($id);
            header("location:index.php?ctrl=forum&action=listUsers");
        }

        // le controller communique avec la vue "listUsers" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/listUsers.php",
            "meta_description" => "Liste des Users du forum",
            "data" => [
                "users" => $users
            ]
        ];
    }

    public function delTopic($id) {
        
        // créer une nouvelle instance de TopicManager
        $topicManager = new TopicManager();
        if (isset($_POST['del'])) {
            $id = $_POST['supPost'];
            // supprimer l'utilisateur' choisie grâce à la méthode delete de Manager.php 
            $topics = $topicManager->delTopic($id);
            header("location:index.php?ctrl=forum&action=listTopics");
        }

        // le controller communique avec la vue "listTopics" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des Topics du forum",
            "data" => [
                "Topics" => $topics
            ]
        ];
    }

    public function delPost($id) {
        
        // créer une nouvelle instance de postManager
        $postManager = new PostManager();
        if (isset($_POST['del'])) {
            $id = $_POST['supPost'];
            // supprimer l'utilisateur' choisie grâce à la méthode delete de Manager.php 
            $posts = $postManager->delete($id);
            header("location:index.php?ctrl=forum&action=listPosts");
        }

        // le controller communique avec la vue "listposts" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts du forum",
            "data" => [
                "posts" => $posts
            ]
        ];
    }

    public function updateTopic($id) {
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
    
        return [
            "view" => VIEW_DIR."forum/updateTopic.php",
            "meta_description" => "Modification de la catégorie",
            "data" => [
                "topic" => $topic
            ]
        ];
    }

    public function detailTopic($id) {
        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $posts = $postManager->detailTopic($id);
        $topic = $topicManager->findOneById($id);
        
        return [
            "view" => VIEW_DIR."forum/detailTopic.php",
            "meta_description" => "détail topic",
         
             "data" => [
                "posts" => $posts,
                "topic" => $topic,
            ]
        ];
    }
}