<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: FachrichtungT";
Core::setView("FachrichtungT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "FachrichtungT");
$FachrichtungT_list=[];
$FachrichtungT=new FachrichtungT();
FachrichtungT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$FachrichtungT_list=$FachrichtungT->search(filter_input(INPUT_POST, "search"));
}else{
$FachrichtungT_list=FachrichtungT::findAll();
}
Core::publish($FachrichtungT_list, "FachrichtungT_list");
Core::publish($FachrichtungT, "FachrichtungT");
