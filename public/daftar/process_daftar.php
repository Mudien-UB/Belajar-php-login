<?php
    include "../function/function.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(daftar($userName, $email, $password)){
            $message = "Pendaftaran berhasil.";
            session_start();
            $_SESSION['username'] = $userName;
            header("Location: ../../");
            exit();
        }else{
            $message = "Pendaftaran gagal. harap coba lagi atau hubungi admin !";
            exit();
        }

    }
?>