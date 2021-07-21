<?php
$taskType = "detail";
$classSettings =Impfpatient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impfpatient";
Core::setView("Impfpatient_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impfpatient");
$Impfpatient_list_2 = Impfpatient::findAll();
Core::publish($Impfpatient_list_2, "Impfpatient_list_2");
$Impfpatient_list=[];
$Impfpatient=new Impfpatient();
Impfpatient::$activeViewport="detail";
$Impfpatient->loadDBData($_GET["id"]);
Core::publish($Impfpatient, "Impfpatient");
//Beziehungen:
//Enumerationen
//to: Termin  _a:
$Termin_a=new Termin();
$Termin_a_list=[];
$Termin_a_list = $Termin_a->query(Termin::SQL_SELECT_Impfpatient, [$Impfpatient->id]);
Core::publish($Termin_a_list, "Termin_a_list");
Core::publish($Termin_a, "Termin_a");
Core::$view->path["view_Termin_a"]="views/view.Termin_a_detail_overview.php";
//to: Dokument  _b:
$Dokument_b=new Dokument();
$Dokument_b_list=[];
$Dokument_b_list = $Dokument_b->query(Dokument::SQL_SELECT_Impfpatient, [$Impfpatient->id]);
Core::publish($Dokument_b_list, "Dokument_b_list");
Core::publish($Dokument_b, "Dokument_b");
Core::$view->path["view_Dokument_b"]="views/view.Dokument_b_detail_overview.php";
