<?php

function getTemplate($template,$content,$data=[]){
    ob_start();
    extract($data);
    include TEMPLATEPATH."default.php";
    return ob_get_clean();
}

function getView($view,$data=[]){
    ob_start();
    extract($data);
    include VIEWSPATH.$view.".php";
    return ob_get_clean();
}

function getViewWTempate($template,$view,$data=[]){
    $content = getView($view,$data);
    return getTemplate($template,$content,$data);
}