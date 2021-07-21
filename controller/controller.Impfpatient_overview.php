<?php
$taskType = "list";
$classSettings =Impfpatient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Impfpatient";
Core::setView("Impfpatient_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Impfpatient");
$Impfpatient_list=[];
$Impfpatient=new Impfpatient();
Impfpatient::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Impfpatient_list=$Impfpatient->search(filter_input(INPUT_POST, "search"));
}else{
$Impfpatient_list=Impfpatient::findAll();
}
Core::publish($Impfpatient_list, "Impfpatient_list");
Core::publish($Impfpatient, "Impfpatient");
//Enumerationen
