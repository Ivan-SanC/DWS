<?php

class city
{
    protected int $id;
    protected string  $name;
    protected string $countryCode;

    /**
     * @param int $id
     * @param string $name
     * @param string $countryCode
     */
    public function __construct(int $id, string $name, string $countryCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->countryCode = $countryCode;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }


}