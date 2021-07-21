<?php
$taskType = "list";
$classSettings =Impfstoffart::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Impfstoffart";
Core::setView("Impfstoffart_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoffart");
$Impfstoffart_list=[];
$Impfstoffart=new Impfstoffart();
Impfstoffart::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Impfstoffart_list=$Impfstoffart->search(filter_input(INPUT_POST, "search"));
}else{
$Impfstoffart_list=Impfstoffart::findAll();
}
Core::publish($Impfstoffart_list, "Impfstoffart_list");
Core::publish($Impfstoffart, "Impfstoffart");
//Enumerationen
