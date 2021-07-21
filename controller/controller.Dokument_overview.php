<?php
$taskType = "list";
$classSettings =Dokument::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Dokument";
Core::setView("Dokument_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Dokument");
$Dokument_list=[];
$Dokument=new Dokument();
Dokument::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Dokument_list=$Dokument->search(filter_input(INPUT_POST, "search"));
}else{
$Dokument_list=Dokument::findAll();
}
Core::publish($Dokument_list, "Dokument_list");
Core::publish($Dokument, "Dokument");
//Enumerationen
$Dokumentart = DokumentartT::findAll();
Core::publish($Dokumentart, 'Dokumentart');
