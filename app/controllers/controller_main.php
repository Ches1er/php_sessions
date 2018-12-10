<?php

include FUNC."view_fns.php";
include FUNC."check_fns.php";

function action_index(){
    session_start();
    $data=[
        "title"=>"Main",
        "auth"=>auth_isAuth(),
        "active_user"=>auth_getUser()
    ];
    echo getViewWTempate("template","main",$data);
}

function action_login(){
    session_start();
    $name = $_POST["name"];
    auth_login($name);
    header("Location:/");
    return "";
}



