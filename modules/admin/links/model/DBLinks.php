<?php
namespace modules\admin\links\model;
use models\database;

class DBLinks extends database{
//create
    public function insertLinks($array){
        try{
            var_dump($array);
            $stmt = $this->conn->prepare("INSERT INTO links(title, description, url) VALUES(:title, :description, :url)");
            $stmt->execute($array);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
//update
    public function updateLinks($array)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE links set url= '" . $array['url'] . "' WHERE id_links = '" . $array['id_links']. "'");
            $stmt->execute($array);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
 // views

    public function existLinks($id){
        try{
            $stmt = $this->conn->query("select * from links where id_links=".$id);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }


// delete

    public function deleteUser($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = '".$id."'");
            $stmt->execute();

            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

//gets

/*
 * os tipos é de 1 a sei la qunado onde cada numero significa um
 * lugar especifico onde o links ira ficar.
 * */
    public function getLinksForType($id){
        $rs = $this->conn->query("SELECT * FROM links where id_links=".$id);
        return $rs->fetch(\PDO::FETCH_ASSOC);
    }


//views
    public function viewAll(){ // retorna um array com as informações de acordo com o mês
        return $this->conn->query("SELECT * FROM links ")->fetchAll(\PDO::FETCH_ASSOC);
    }

}