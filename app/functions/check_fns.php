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
        if ($user["id"]==@$_SESSION["id"])return true;
        else return false;
    }
}

function auth_login($name){
    $users=getUsers();
    foreach ($users as $user){
        if ($user["name"]==$name){
            $_SESSION["id"]=$user["id"];
        }
    }
}

function auth_getUser(){
    $users = getUsers();
    foreach ($users as $user){
        if ($user["id"]==@$_SESSION["id"]) return $user["name"];
        else return "No active users";
    }
}