<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: DokumentartT";
Core::setView("DokumentartT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "DokumentartT");
$DokumentartT_list=[];
$DokumentartT=new DokumentartT();
DokumentartT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$DokumentartT_list=$DokumentartT->search(filter_input(INPUT_POST, "search"));
}else{
$DokumentartT_list=DokumentartT::findAll();
}
Core::publish($DokumentartT_list, "DokumentartT_list");
Core::publish($DokumentartT, "DokumentartT");
