<?php
/* Object for storing ingredient information
*/
class MenuItem
{
	public $name;
    public $imagePath;
    public $primaryKey;


	 /*
     * Constructor
     */
    public function __construct() {
        // allocate your stuff
    }

    /*
     * Static constructor / factory
     */
    public static function create() {
        $instance = new self();
        return $instance;
    }

    /*
     * Name setter 
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /*
     * Path setter 
     */
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
        return $this;
    }

    /*
     * Primary Key
     */
    public function setPrimaryKey($primaryKey) {
        $this->primaryKey = $primaryKey;
        return $this;
    }
}

