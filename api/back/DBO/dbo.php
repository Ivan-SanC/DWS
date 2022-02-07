<?php

class dbo extends mysqli
{
    public string $hostname = "localhost";
    public string $username = "root";
    public string $password = "Pascal.69";
    public string $database = "db_turismo";

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