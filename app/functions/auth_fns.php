<?php

function auth_isAuth(){
    session_start();
    $users = getData("users");
    foreach ($users as $user){
        if ($user["id"]==@$_SESSION["id"]){
            return true;
        }
    }
    return false;
}

function auth_login($user){
    $users=getData("users");
    foreach ($users as $u){
        if ($u["name"] == $user["login"] && $u["password"] == $user["password"]) {
            $_SESSION["id"]=$u["id"];
            return true;
        }
    }
    return false;
}

function auth_addUser($name,$password){
    $users=getData("users");
    $new_user=[];
    $new_user["id"]=time();
    $new_user["name"]=$name;
    $new_user["password"]=$password;
    $users[]=$new_user;
    saveData($users,"users");
}