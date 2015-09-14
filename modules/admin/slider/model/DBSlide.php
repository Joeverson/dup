<?php
namespace modules\admin\slider\model;
use models\database;

class DBSlide extends database{
//create
    public function insertSlide($array){
        try{
            var_dump($array);
            $stmt = $this->conn->prepare("INSERT INTO slider(url) VALUES(:url)");
            $stmt->execute($array);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
//update
    public function updateSlider($array)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE slider set url= '" . $array['url'] . "' WHERE id_slider = '" . $array['id_slider']. "'");
            $stmt->execute($array);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
 // views

    public function existSlider($id){
        try{
            $stmt = $this->conn->query("select * from slider where id_slider=".$id);
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
 * lugar especifico onde o slider ira ficar.
 * */
    public function getSliderForType($id){
        $rs = $this->conn->query("SELECT * FROM slider where id_slider=".$id);
        return $rs->fetch(\PDO::FETCH_ASSOC);
    }


}