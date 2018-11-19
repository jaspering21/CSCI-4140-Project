<?php
class Order
{
    public $orderID;
	public $tableID;
    public $order;
    public $status = "In Progress";


	 /*
     * Constructor
     */
    public function __construct() {
        $this->status = "In Progress";
        // allocate your stuff
    }

    /*
     * Static constructor / factory
     */
    public static function create() {
        $instance = new self();
        return $instance;
    }

    public function setOrderID($orderID) {
        $this->orderID = $orderID;
        return $this;
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

    /* Switches between statuses for the purposes of order completion*/
     public function toggleStatus() {
        if ($this->status == "In Progress"){
            $this->status = "Completed";
        }
        else {
            $this->status = "In Progress";
        }
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
