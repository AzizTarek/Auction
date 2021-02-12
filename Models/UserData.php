<?php
//Stores the data to each field from the result of the query

class UserData {

    protected $userID,$user_name,$user_username,$user_email,$user_type,$user_pass;

    public function __construct($dbRow) {
        $this->userID= $dbRow['userID'];
        $this->user_name = $dbRow['user_name'];
        $this->user_username = $dbRow['user_username'];
        $this->user_email = $dbRow['user_email'];
        $this->user_type= $dbRow['user_type'];
        $this->user_pass = $dbRow['user_pass'];
  }

    public function getUserID() {
        return $this->userID;
    }

    public function getName() {
        return $this->user_name;
    }

    public function getUsername() {
        return $this->user_username;
    }

    public function getEmail() {
        return $this->user_email;
    }
    public function getType() {
        return $this->user_type;
    }

    public function getUserPass() {
        return $this->user_pass;
    }

}


