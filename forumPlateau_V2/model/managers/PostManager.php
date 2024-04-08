<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }


    // récupérer tous les posts avec auteur
    public function findAllWithAuthors($order = null) {

        $orderQuery = ($order) ?                 
            "ORDER BY ".$order[0]. " ".$order[1] :
            "";

        $sql = "SELECT *
                FROM ".$this->tableName." 
                INNER JOIN user On user.id_user = ".$this->tableName.".user_id
                INNER JOIN topic On topic.id_topic = ".$this->tableName.".topic_id
                ".$orderQuery;

        return $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }
    
}