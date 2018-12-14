<?php

function getData($data_file){
    return json_decode(file_get_contents(DATAFILE."{$data_file}.json"),true);
}

function saveData($users,$data_file){
    file_put_contents(DATAFILE."{$data_file}.json",json_encode($users));
}

function getDataById($data,$id){
    foreach ($data as $dataUnit){
        if ($dataUnit["id"]==$id) return $dataUnit;
    }
}