<?php

function _auth_hash_pass($password){
    return hash("sha256",$password);
}

function _auth_get_user_by_name($name){
    $users = getData("users");
    foreach ($users as $user){
        if ($user["name"]===$name)return $user;
    }
    return NULL;
}

function currentUser(){
    return getDataById(getData("users"),$_SESSION["id"])["name"];
}

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
        if ($u["name"] == $user["login"] && $u["password"] === _auth_hash_pass($user["password"])) {
            $_SESSION["id"]=$u["id"];
            $_SESSION["agent"]=md5($_SERVER["HTTP_USER_AGENT"]);
            return true;
        }
    }
    return false;
}

function auth_addUser($name,$password){
    if (_auth_get_user_by_name($name)!==NULL)return false;
    $new_user=[
        "id"=>time(),
        "name"=>$name,
        "password"=>_auth_hash_pass($password)
    ];
    appendData($new_user,"users");
    $records=[
        "user"=>$name
    ];
    appendData($records,"records");
    return true;
}