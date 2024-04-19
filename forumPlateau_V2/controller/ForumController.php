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

    public function addCategory() {
        
        // créer une nouvelle instance de categoryManager
        $categoryManager = new CategoryManager();
        if (isset($_POST['add'])) {

            $nom = filter_input(INPUT_POST,'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;
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

    public function addTopic($id) {
        
        // créer une nouvelle instance de categoryManager
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        if (isset($_POST['add'])) {

            $title = filter_input(INPUT_POST,'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;
            $text = filter_input(INPUT_POST,'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;

            // ....
            $data1 = [
                'title' => $title,
                'category_id' => $id,
                'user_id' => Session::getUser()->getId()
            ];
            
            $idTopic = $topicManager->add($data1);
            
            // ....
            $data2 = [
                'text' => $text,
                'topic_id' => $idTopic,
                'user_id' => Session::getUser()->getId()
            ];
            // ajouter une categorie
            $postManager->add($data2);

            $this->redirectTo("forum", "listTopicsByCategory", $id);
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

    public function addPost($id) {
        
        // créer une nouvelle instance de categoryManager
        $postManager = new PostManager();
        $topicManager = new TopicManager();

        $topic = $topicManager->findOneById($id);

        if (isset($_POST['add'])) {
            //var_dump("ok");die;

            $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
            $data = [
                'text' => $text,
                'topic_id' => $id,
                'user_id' => Session::getUser()->getId()
            ];
            // ajouter une categorie
            $post = $postManager->add($data);
            $this->redirectTo("forum", "detailTopic", $id);
        }
            // le controller communique avec la vue "addPost" (view) pour lui envoyer la liste des post (data)
            return [
                "view" => VIEW_DIR."forum/addPost.php",
                "meta_description" => "Liste des post du forum",
                "data" => [
                    // "categories" => $categories
                    "topic" => $topic
                ]
            ];
    }

    public function delCategory($id) {
        
        // créer une nouvelle instance de categoryManager
        $categoryManager = new CategoryManager();
        if (isset($_POST['del'])) {
            $id = filter_input(INPUT_POST,'supCat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
            $id = filter_input(INPUT_POST,'supUser', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
            $id = filter_input(INPUT_POST,'supPost', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
        $post = $postManager->findOneById($id);
        $topicId = $post->getTopic()->getId();

            // supprimer l'utilisateur' choisie grâce à la méthode delete de Manager.php 
            $postManager->delete($id);
            $this->redirectTo("forum", "detailTopic", $topicId);

        // le controller communique avec la vue "listposts" (view) pour lui envoyer la liste des utilisateurs (data)
        return [
            "view" => VIEW_DIR."forum/detailTopic.php",
            "meta_description" => "Liste des posts du forum",
            "data" => [
                "posts" => $posts
            ]
        ];
    }

    public function updatePost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);
        $this->redirectTo("forum", "detailTopic", $topicId);
        
        if (isset($_POST['update'])) {
            $text = filter_input(INPUT_POST,'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $colonne = 'text';
            $post->update($colonne,$text);
            $this->redirectTo("forum", "detailTopic", $topicId);
        }
        return [
            "view" => VIEW_DIR."forum/updatePost.php",
            "meta_description" => "Modification du Post",
            "data" => [
                "post" => $post
            ]
        ];
    }

    
}