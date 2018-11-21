<?php

class Database{
	public $host;
    public $user;
    public $password;
    public $name;

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

    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
}
