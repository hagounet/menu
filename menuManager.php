<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 29/04/15
 * Time: 09:48
 */



class menuManager{

    private $t = 'menu';
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getListMenu(){

        $results=$this->db->query("SELECT *
                                  FROM ".$this->t.
                                  " ORDER BY name ASC");
        return $results->fetchAll();
    }

    public function ajouterMenu($name, $parent){


        $sql = 'INSERT INTO '.$this->t. '(id , parent_id , name)
                VALUES("", :parent , :name )';

        $req =$this->db->prepare($sql);

        $req->bindParam(':name',$name);
        $req->bindParam(':parent',$parent);
        $req->execute();




    }

} 