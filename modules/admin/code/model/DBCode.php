<?php

namespace modules\admin\code\model;
use models\database;

class DBCode extends database{

// inserts
    public function insertCode($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO code(title, description, content) VALUES(:title, :description, :content)");
            $stmt->execute($array);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }

//find
    public function findCode($str){
        try{
            $stmt = $this->conn->query("select * from code where title like '%".$str."%' or description like '%".$str."%'");
            $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if(!$rs)
                return $rs['nothing'] = "Nada Encontrado!";

            return $rs;
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }


//views

    public function viewAllCodes(){
        try{
            $stmt = $this->conn->prepare("select * from code");
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }

    public function viewACodesById($id){
        try{
            $stmt = $this->conn->prepare("select * from code WHERE id_code=".$id);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }

//deletes

    public function deleteCode($id){
        try{
            $stmt = $this->conn->prepare("delete from code WHERE id_code=".$id);
            $stmt->execute();
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }
}