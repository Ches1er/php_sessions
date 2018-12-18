<?php

function get_funcs(){
    $funcs_array=include ROOTPATH."func_config.php";
    foreach ($funcs_array as $func){
        include FUNC."{$func}_fns.php";
    }
}

function _redirect_($url){
    header("Location:{$url}");
    return "";
}

function get_filter_pathes(){
    $pathes = include "root_config.php";
    $filter = include "routing_filter.php";
    if (auth_isAuth())return $pathes;
    else{
        $pathes_w_filter=[];
        foreach ($pathes as $path=>$value){
            if(!in_array($path,$filter))$pathes_w_filter[$path]=$value;
        }
        return $pathes_w_filter;
    }
}

function getControllersActions($contr_action){
    $contr_action_arr = explode("@",$contr_action);
    include CONTROLLERSPATH."controller_".$contr_action_arr[0].".php";
    call_user_func("action_".$contr_action_arr[1]);
}

function navigate(){
    $url = $_SERVER["REQUEST_URI"];
    $url = trim(explode("?",$url)[0],"/");
    $pathes = get_filter_pathes();
    foreach ($pathes as $path=>$contr_action){
        if ($path===$url)return getControllersActions($contr_action);
    }
    return getControllersActions("error@404");
}