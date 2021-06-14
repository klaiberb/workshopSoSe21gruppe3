<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: AussageT";
Core::setView("AussageT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "AussageT");
$AussageT_list=[];
$AussageT=new AussageT();
AussageT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$AussageT_list=$AussageT->search(filter_input(INPUT_POST, "search"));
}else{
$AussageT_list=AussageT::findAll();
}
Core::publish($AussageT_list, "AussageT_list");
Core::publish($AussageT, "AussageT");
