<?php
include_once "../DB/dbo.php";
include_once "../Entities/user.php";


class loginModel
{
    protected dbo $dbo;

    /**
     * @param dbo $dbo
     */
    public function __construct()
    {
        $this->dbo = new dbo();
    }


    public function getUser($mail, $password)
    {
        $this->dbo->default();
        $sql = "SELECT * FROM users WHERE mail = '" . $mail . "'";
        $query = $this->dbo->query($sql);
        if ($result = $query->fetch_assoc()) {
            if (crypt($password, $result["password"]) == $result["password"]) {
                return new user($result["id"], $result["mail"], $result["password"]);
            }
        }
        return new user(0, "-", "-");
    }


}