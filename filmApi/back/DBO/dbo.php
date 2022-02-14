<?php

class dbo extends mysqli
{
    public string $hostname="localhost";
    public string $nameuser="root";
    public string $password="admin";
    public string $database="db_sakila";

    public function default(){
        $this->local();
    }
    public function local(){
        parent::__construct($this->hostname,$this->nameuser,$this->password,$this->database);
        if(mysqli_connect_error()){
            die("ERROR DATABASE: ".mysqli_connect_error());
        }
    }

}