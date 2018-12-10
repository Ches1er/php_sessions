<?php

function getControllersActions($contr_action){
    $contr_action_arr = explode("@",$contr_action);
    include CONTROLLERSPATH."controller_".$contr_action_arr[0].".php";
    call_user_func("action_".$contr_action_arr[1]);
}

function navigate(){
    $url = $_SERVER["REQUEST_URI"];
    $url = trim(explode("?",$url)[0],"/");
    $pathes = include "root_config.php";
    foreach ($pathes as $path=>$contr_action){
        if ($path===$url)return getControllersActions($contr_action);
    }
    return getControllersActions("error@404");
}