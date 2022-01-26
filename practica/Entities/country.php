<?php
include_once "user.php";

class country
{
    protected string $code;
    protected string $name;
    protected int $population;
    protected float $gnp;
    protected int $numLang;
    protected int $numCities;
    protected user $user;

    /**
     * @param string $code
     * @param string $name
     * @param int $population
     * @param float $gnp
     * @param int $numLang
     * @param int $numCities
     * @param user $user
     */
    public function __construct(string $code, string $name, int $population, float $gnp, int $numLang, int $numCities, user $user)
    {
        $this->code = $code;
        $this->name = $name;
        $this->population = $population;
        $this->gnp = $gnp;
        $this->numLang = $numLang;
        $this->numCities = $numCities;
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPopulation(): int
    {
        return $this->population;
    }

    /**
     * @return float
     */
    public function getGnp(): float
    {
        return $this->gnp;
    }

    /**
     * @return int
     */
    public function getNumLang(): int
    {
        return $this->numLang;
    }

    /**
     * @return int
     */
    public function getNumCities(): int
    {
        return $this->numCities;
    }

    /**
     * @return user
     */
    public function getUser(): user
    {
        return $this->user;
    }

}