<?php
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"]);
define("APPPATH",DOCROOT."/app");
define("ROOTPATH",APPPATH."/root/");
define("CONTROLLERSPATH",APPPATH."/controllers/");
define("VIEWSPATH",APPPATH."/views/");
define("TEMPLATEPATH",APPPATH."/templates/");
define("FUNC",APPPATH."/functions/");
define("DATAFILE",APPPATH."/data/");

define("NUMBER",20);

include ROOTPATH."routing.php";

print_r(navigate()) ;
