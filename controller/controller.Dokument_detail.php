<?php
$taskType = "detail";
$classSettings =Dokument::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Dokument";
Core::setView("Dokument_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Dokument");
$Dokument_list_2 = Dokument::findAll();
Core::publish($Dokument_list_2, "Dokument_list_2");
$Dokument_list=[];
$Dokument=new Dokument();
Dokument::$activeViewport="detail";
$Dokument->loadDBData($_GET["id"]);
Core::publish($Dokument, "Dokument");
//Beziehungen:
//Enumerationen
$Dokumentart = DokumentartT::findAll();
Core::publish($Dokumentart, 'Dokumentart');
//to: Impfpatient  :
$Impfpatient=new Impfpatient();
$Impfpatient_list=[];
$Impfpatient_list = $Impfpatient->query(Impfpatient::SQL_SELECT_Dokument_b, [$Dokument->_Impfpatient]);
Core::publish($Impfpatient_list, "Impfpatient_list");
Core::publish($Impfpatient, "Impfpatient");
Core::$view->path["view_Impfpatient"]="views/view.Impfpatient_detail_overview.php";
