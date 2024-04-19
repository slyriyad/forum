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

    
    public function detailTopic($id){

        $sql = "SELECT * 
                FROM ".$this->tableName." p 
                WHERE p.topic_id = :id
                ORDER BY creationDate";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function update($col,$newVal){

        $sql = "UPDATE ".$this->tableName." p 
                SET $col,'$newVal'
                WHERE p.id_topic = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        try{
            return DAO::update($sql);
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}


    
