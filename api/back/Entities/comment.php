<?php
class comment
{
    public string $nameUser;
    public string $comment;

    /**
     * @param string $nameUser
     * @param string $comment
     */
    public function __construct(string $nameUser, string $comment)
    {
        $this->nameUser = $nameUser;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getNameUser(): string
    {
        return $this->nameUser;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }


}