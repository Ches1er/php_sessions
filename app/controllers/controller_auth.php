<?php

function _errors_($error_code,$redirectPath){
    session_start();
    $_SESSION["repeat_name"] = $_POST["login"];
    switch ($error_code){
        case "null name":
            $_SESSION["error"]="Please fill in name field";
            _redirect_($redirectPath);
            break;
        case "null password":
            $_SESSION["error"]="Please fill in password field";
            _redirect_($redirectPath);
            break;
        case "null confirm password":
            $_SESSION["error"]="Please confirm password";
            _redirect_($redirectPath);
            break;
        case "non equal password":
            $_SESSION["error"]="Do not equal password";
            _redirect_($redirectPath);
            break;
        case "no such user":
            $_SESSION["error"]="No such user, sign up please";
            _redirect_($redirectPath);
            break;
    }
}

function action_login(){
    session_start();
    echo getViewWTempate("template","login");
}

function action_signup(){
    session_start();
    echo getViewWTempate("template","signup");
}

function action_login_handle(){
    session_start();
    $user=[];
    if (empty($_POST["login"])){
        _errors_("null name","/login");
    }
    else if (empty($_POST["password"])){
        _errors_("null password","/login");
    }
    else {
        $user["login"]=$_POST["login"];
        $user["password"]=$_POST["password"];
    }
    if (!auth_login($user)){
        _errors_("no such user","/signup");
    }
    else _redirect_("/");
    return "";
}

function action_signup_handle(){
    session_start();
    if (empty($_POST["name"])){
        _errors_("null name","/signup");
    }
    else if (empty($_POST["password"])){
        _errors_("null password","/signup");
    }
    else if (empty($_POST["password_confirm"])){
        _errors_("null confirm password","/signup");
    }
    else if ($_POST["password"]!==$_POST["password_confirm"]){
        _errors_("non equal password","/signup");
    }
    else {
        auth_addUser($_POST["name"],$_POST["password"]);
        $_SESSION["error"]="";
        _redirect_("/login");
    }
    return "";
}

function action_logout(){
    session_start();
    session_destroy();
    _redirect_("/");
}
