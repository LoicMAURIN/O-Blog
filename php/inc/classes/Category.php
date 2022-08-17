<?php

class Category {

    // la propriété est privée donc on doit écrire un getter et un setter, grace à l'extension VScode PHP getters and setters on peut les generer en faisant un click droit sur le nom de la prop
    private $name;


    public function __construct($categoryName) {
        // à chaque new le constructeur est appelé et il initialise la valeur du nom de categorie
        $this->name = $categoryName;
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