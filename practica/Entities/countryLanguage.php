<?php

class countryLanguage
{
    protected string $countryCode;
    protected string $language;

    /**
     * @param string $countryCode
     * @param string $language
     */
    public function __construct(string $countryCode, string $language)
    {
        $this->countryCode = $countryCode;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }


}