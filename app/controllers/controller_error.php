<?php

function action_404(){
    session_start();
    $data=[
        "title"=>"Error"
    ];
    echo getViewWTempate("template","404",$data);
}