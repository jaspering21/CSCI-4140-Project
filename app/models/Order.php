<?php
class Order
{
	public $tableID;
    public $order;
    public $status;


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

    public function setTableID($tableID) {
        $this->tableID = $tableID;
        return $this;
    }

    public function setOrder($order) {
        $this->order = $order;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function getTableActionMessage($status) {
    	if ($status == "Completed"){
    		return "Reopen Order";
    	}
    	else{
    		return "Mark Completed ";
    	}
    }

    public function getButtonClass($status) {
    	if ($status == "Completed"){
    		return "btn btn-secondary";
    	}
    	else{
    		return "btn btn-success ";
    	}
    }
}
