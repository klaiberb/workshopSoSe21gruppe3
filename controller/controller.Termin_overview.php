<?php
$taskType = "list";
$classSettings =Termin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Termin";
Core::setView("Termin_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Termin");
$Termin_list=[];
$Termin=new Termin();
Termin::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Termin_list=$Termin->search(filter_input(INPUT_POST, "search"));
}else{
$Termin_list=Termin::findAll();
}
Core::publish($Termin_list, "Termin_list");
Core::publish($Termin, "Termin");
//Enumerationen
$Aussage = AussageT::findAll();
Core::publish($Aussage, 'Aussage');
