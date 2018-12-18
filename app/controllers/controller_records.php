<?php

function action_addcat(){
    $catname = $_POST["cat_name"];
    addCat($catname);
    _redirect_("/");
    return "";
}