<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 29/04/15
 * Time: 08:55
 */

class db {

    // VALEURS A MODIFIER
        private $host = '';
        private $user = '';
        private $db_name = '';
        private $pwd = '';
        public  $db;



        public function __construct($host = null,$db_name = null,$user =null,$pwd =null)
        {
            if(null === $host)$host =$this->host;
            if(null === $db_name)$db_name =$this->db_name;
            if(null === $user)$user =$this->user;
            if(null === $pwd)$pwd =$this->pwd;

            try {

                $dbh = new PDO('mysql:host='.$host.';dbname='.$db_name,$user,$pwd);
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                $dbh->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ERRMODE_WARNING);

                $this->db = $dbh;
            } catch (PDOException $e) {
                echo "Failed: " . $e->getMessage();
            }

        }





} 