<?php
$taskType = "list";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Arzt";
Core::setView("Arzt_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Arzt");
$Arzt_list=[];
$Arzt=new Arzt();
Arzt::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Arzt_list=$Arzt->search(filter_input(INPUT_POST, "search"));
}else{
$Arzt_list=Arzt::findAll();
}
Core::publish($Arzt_list, "Arzt_list");
Core::publish($Arzt, "Arzt");
//Enumerationen
$Fachrichtung = FachrichtungT::findAll();
Core::publish($Fachrichtung, 'Fachrichtung');
