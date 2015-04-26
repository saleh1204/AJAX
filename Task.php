<?php

class Task {
    public $id;
    public $description; 
    public $type; 
    public $datedue;
    function __construct($id, $description, $type, $datedue) {        
        $this->id = $id;
        $this->description = $description;
        $this->type = $type;
        $this->datedue = $datedue;
	// This is a comment to test GitHub
    }
    function getID()
    {
        return $this->id;
    }
    function getDescription()
    {
        return $this->description;
    }
    function getType()
    {
        return $this->type;
    }
    function getDateDue()
    {
        return $this->datedue;
    }
}
