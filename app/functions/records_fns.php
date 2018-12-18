<?php

function addCat($catname){
   $records = getData("records");
   foreach ($records as &$record){
        if ($record["user"]===currentUser())$record[$catname]=[];
    }
   saveData($records,"records");
   return true;
}