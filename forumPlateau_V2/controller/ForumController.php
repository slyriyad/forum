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
        $topics = $topicManager->findAllWithAuthors(["title", "DESC"]);

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
}