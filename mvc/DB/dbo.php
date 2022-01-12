<?php

class dbo
{
    protected string $hostname = "localhost";
    protected string $username = "root";
    protected string $password = "Pascal.69";
    protected string $database = "db_turismo";

    //Conexion
    public function default()
    {
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("Error Database" . mysqli_connect_error());
        }
    }
}