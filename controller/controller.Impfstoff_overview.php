<?php
$taskType = "list";
$classSettings =Impfstoff::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Impfstoff";
Core::setView("Impfstoff_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoff");
$Impfstoff_list=[];
$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Impfstoff_list=$Impfstoff->search(filter_input(INPUT_POST, "search"));
}else{
$Impfstoff_list=Impfstoff::findAll();
}
Core::publish($Impfstoff_list, "Impfstoff_list");
Core::publish($Impfstoff, "Impfstoff");
//Enumerationen
