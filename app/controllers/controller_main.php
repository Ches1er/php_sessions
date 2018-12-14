<?php

function action_index(){
    session_start();
    $data=[
        "title"=>"Main",
        "currentUser"=>getDataById(getData("users"),$_SESSION["id"])["name"],
    ];
    echo getViewWTempate("template","main",$data);
}

function action_contacts(){
    session_start();
    $data=[
        "title"=>"Contacts"
    ];
    echo getViewWTempate("template","contacts",$data);
}
