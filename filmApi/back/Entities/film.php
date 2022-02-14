<?php

include_once "actor.php";
include_once "category.php";
include_once "language.php";
include_once "user.php";

class film
{
    public int  $id;
    public string $title;
    public string $description;
    public int $year;
    public language $language;
    public int $length;
    public string $rating;
    public array $actor;
    public array $category;
    public user $user;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $year
     * @param language $language
     * @param int $length
     * @param string $rating
     * @param array $actor
     * @param array $category
     * @param user $user
     */
    public function __construct(int $id, string $title, string $description, int $year, language $language, int $length, string $rating, array $actor, array $category, user $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
        $this->language = $language;
        $this->length = $length;
        $this->rating = $rating;
        $this->actor = $actor;
        $this->category = $category;
        $this->user = $user;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return language
     */
    public function getLanguage(): language
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @return array
     */
    public function getActor(): array
    {
        return $this->actor;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return $this->category;
    }

    /**
     * @return user
     */
    public function getUser(): user
    {
        return $this->user;
    }


}