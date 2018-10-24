<?php
/* Object for storing ingredient information
*/
class Ingredient
{
	public $name;
	public $quantity;
	public $unit;

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
     * Quantity setter 
     */
    public function setQuantity( $quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    /*
     * Unit setter
     */
    public function setUnit( $unit) {
        $this->unit = $unit;
        return $this;
    }
}

