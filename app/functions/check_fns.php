<?php

function getUsers(){
    $users = file_get_contents(DATAFILE."users".".json");
    return $users = json_decode($users,true);
}

function saveData($users){
     file_put_contents(DATAFILE."users".".json",json_encode($users));
}

function auth_isAuth(){
    $users = getUsers();
    foreach ($users as $user){
        if ($user["id"]==@$_SESSION["id"])return $user["name"];
    }
    return "No active users";
}

function auth_login($name,$password){
    $users=getUsers();
    foreach ($users as $user){
        if ($user["name"] == $name && $user["password"] == $password) {
            $_SESSION["id"]=$user["id"];
        }
    }
}

function auth_addUser($name,$password){
    $users = getUsers();
    $new_user=[];
    $new_user["id"]=time();
    $new_user["name"]=$name;
    $new_user["password"]=$password;
    $users[]=$new_user;
    saveData($users);
}