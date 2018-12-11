<?php

include FUNC."view_fns.php";
include FUNC."check_fns.php";

function action_index(){
    session_start();
    $data=[
        "title"=>"Main",
        "auth"=>auth_isAuth(),
    ];
    echo getViewWTempate("template","main",$data);
}

function action_login(){
    session_start();
    $name = $_POST["name"];
    $password = $_POST["password"];
    auth_login($name,$password);
    header("Location:/");
    return "";
}

function action_logout(){
    session_start();
    session_destroy();
    header("Location:/");
    return "";
}

function action_newuser(){
    $new_name = $_POST["new_name"];
    $new_password = $_POST["new_password"];
    auth_addUser($new_name,$new_password);
    header("Location:/");
    return "";
}
