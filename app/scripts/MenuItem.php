<?php
/* Object for storing ingredient information
*/
class MenuItem
{
	public $name;
    public $imagePath;
    public $primaryKey;
    public $price;


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

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    /*
    * Encoded name for passing by post
    */
    public function encodePostVariable($postVariable) {
        return "MenuItem".",".$postVariable;
    }

    /*
    * Decodes 
    */
    public function decodePostVariable($postVariable) {
        if(strpos($postVariable, 'MenuItem') !== false){
            $itemArray = explode (",", $postVariable);
            var_dump($itemArray);
            return $itemArray[1];
        }
        return false;
    }
}

