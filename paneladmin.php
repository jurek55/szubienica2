<?php

function rejestracja(){
    require_once 'connect.php';
    $polaczenie=new mysqli($hostname, $username, $user_password, $db_name);
    if (!$polaczenie->connect_errno){
        $user=$_POST['user'];
        $password=$_POST['password'];
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $email=$_POST['email'];
        
        //if (password_verify('krowaaaa', $hash)) echo 'zgodne';
        
        $sql="INSERT INTO uzytkownicy (user , email, haslo) VALUES ( '$user', '$email', '$hash')";
        $polaczenie->query($sql);
    $polaczenie->close();
    }
}

function Logowanie(){

}
