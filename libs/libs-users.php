<?php

function isLoggedin(){
    return isset($_SESSION['login']);
}



function logIn($username,$password){
    global $admins;
    if(array_key_exists($username,$admins) and
    $admins[$username] = $password){
    //password_verify($password, $admins[$username])){
     $_SESSION['login'] = 1;
     return true;
    }
    return false;
}

function logOut(){
    unset($_SESSION['login']);
}