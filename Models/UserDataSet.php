//Class used for fetching users data
<?php
require_once ('Models/Database.php');
require_once ('UserData.php');
class UserDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }
   //Fetch user data if user exists
    public function fetchUserData($email,$pass,$exists)
    {
        $sqlQuery = "SELECT * FROM users WHERE users.user_email=$email AND users.user_pass=$pass";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = '';
        //Checks if the user exists then it fetches users data
        if($exists==true)
        {
            if ($row = $statement->fetch()) {

                $dataSet = new UserData($row);
            }
       }

        return $dataSet ;

    }
       //check if the username is unique in the database and returns boolean value
    public function checkUsername($username)
    {
            $sqlQuery = "SELECT * FROM users WHERE users.user_username=$username";
            $exists = false;
            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement


            if ($row = $statement->fetch()) {
                $exists=true;
            }
            return $exists;
    }



    public function createUser($name,$username,$email,$type,$pass)
    {
       $query ="INSERT INTO users (user_name, user_username, user_email, user_type, user_pass) VALUES ('$name','$username','$email','$type','$pass')";

        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

    }

}