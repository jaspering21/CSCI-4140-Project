<?php
class LoginModel {

/*
Returns



*/ 
public static function getLoginSQL() {
        return "SELECT user_id FROM user WHERE id = '$myusername' and passwords = '$mypassword'";
    }

}