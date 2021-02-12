<?php
// Check sign in info and show appropriate feedback to the user
ini_set('display_errors', '1'); // show errors in browser
session_start();
require_once ('Models/UserDataSet.php');
if (isset($_POST['email']) && isset($_POST['passTxt'])) {

    //Validating the data (making sure it is not some malicious script)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['passTxt']);

    if (empty($email)) {
        header("Location: signin.php?error=Email is required");
        exit();
    }
    else if(empty($password)){
        header("Location: signin.php?error=Password is required");
        exit();
    }
    else{
        // hashing the password
        $password = md5($password);

        //Check if user username and password exist
      require_once ('Models/Database.php');
        $_dbInstance = Database::getInstance();
        $_dbHandle = $_dbInstance->getdbConnection();
        $sqlQuery = "SELECT * FROM users WHERE users.user_email='$email' AND users.user_pass='$password'";
        $statement = $_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $dataSet = '';
        if ($row = $statement->fetch()) {
            $dataSet = new UserData($row);
        }
         //Check if dataset variable is not empty
        if ($dataSet!='') {

            if ($row['user_email'] === $email && $row['user_pass'] === $password) {
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_username'] = $row['user_username'];
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['user_type'] = $row['user_type'];
                header("Location: loggedIn.php");
                exit();
             // echo "<meta http-equiv="refresh" content="0;url=loggedIn.php">";
            }
            else
            {
                header("Location: signin.php?error=Incorrect User name or password");
                exit();
            
            }
        }
        else
        {
            header("Location: signin.php?error=Incorrect User name or password");
            exit();
        }
    }

}else{
    header("Location: signin.php");
    exit();
}