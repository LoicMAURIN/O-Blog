<?php

class Author {

    private $name;

    /**
     * Constructeur
     */ 
    public function __construct($authorName)
    {
        $this->name = $authorName;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}