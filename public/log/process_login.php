<?php

    include "../function/function.php";
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nameOrEmail = $_POST['emailOrName'];
        $password = $_POST['password'];
        if(login($nameOrEmail, $password)){
            session_start();
            $_SESSION['username'] = $nameOrEmail;
            header('Location: ../../');
            exit();
            
            
        }else{
            session_start();
            $_SESSION['error'] = "Login gagal. terdapat kesalahan input.";
            header('Location: ../log'); 
            exit();
        }
    }
    header('Location: ../../');
    exit();
?>