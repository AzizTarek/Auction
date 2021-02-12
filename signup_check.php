<?php
session_start();
require_once ('Models/UserDataSet.php');

if (isset($_POST['username']) && isset($_POST['confirm_passTxt'])&& isset($_POST['emailTxt']) && isset($_POST['user_type']) && isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['passTxt'])) {

    //Validating the data (making sure it is not some malicious script)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Validating all the data
    $username = validate($_POST['username']);
    $user_fname = validate($_POST['firstname']);;
    $user_sname = validate($_POST['lastname']);
    $user_name =$user_fname .' '.$user_sname;
    $password = validate($_POST['passTxt']);
    $confirm_pass =validate( $_POST['confirm_passTxt']);
    $email = validate($_POST['emailTxt']);
    $userType = validate($_POST['user_type']);

    $userData = 'Username='. $username. '&Name='. $user_name;

    //Check if any of the fields is empty
    if (empty( $username)) {
        header("Location: signup.php?error=User Name is required&$userData");
        exit();
    }else if(empty( $password)){
        header("Location: signup.php?error=Password is required&$userData");
        exit();
    }
    else if(empty($confirm_pass )){
        header("Location: signup.php?error=Re Password is required&$userData");
        exit();
    }

    else if(empty($user_fname)&&empty( $user_sname)){
        header("Location: signup.php?error=Name is required&$userData");
        exit();
    }

    else if(empty($email)){
        header("Location: signup.php?error=Email is required&$userData");
        exit();
    }
    else if(( $userType!=0)&&($userType!=1)){
        header("Location: signup.php?error=User Type is required&$userData");
        exit();
    }
    else if($password !== $confirm_pass){
        header("Location: signup.php?error=Passwords do not match&$userData");
        exit();
    }

    else{

        // hashing the password
        $password = md5($password);
          $userDataSet = new UserDataSet();

//        Check if the username is taken
         if ($view->userDataSet= $userDataSet->checkUsername($username)) {
            header("Location: signup.php?error=The username is taken try another&$userData");
            exit();
        }else {
//             Create user
             $view->user=$userDataSet->createUser($user_name,$username,$email,$userType,$password);
             $created=true;
//             Message on successful or unsuccessful user creation
            if ($created) {
                header("Location: signin.php?success=Your account has been created successfully");
                exit();
            }else {
                header("Location: signup.php?error=unknown error occurred&$userData");
                exit();
            }
        }
    }

}else{
    header("Location: signup.php");
    exit();
}