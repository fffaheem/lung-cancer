<?php


include "../partials/conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);


    if($email == "" || $email == NULL){
        echo "Email field cannot be empty";
        exit;
    }

    if($password == "" || $password == NULL){
        echo "Password field cannot be empty";
        exit;
    }


    $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
    $result = $conn->query($sql);
    $aff = $conn->affected_rows;

    if($aff < 1){
        echo "Email not found";
        exit;
    }

    $data = $result->fetch_object();
    $passwordInDatabase = $data->{"password"};

    if(password_verify($password,$passwordInDatabase)){
        echo "success";

        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["loggedIn"] = "true";        


        exit;
    }else{
        echo "Wrong Password";
        exit;
    }

  
    echo "Some problem occured please try again later";
    

    exit;
}

?>