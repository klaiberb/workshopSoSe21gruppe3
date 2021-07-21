<?php
$taskType = "detail";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Arzt";
Core::setView("Arzt_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Arzt");
$Arzt_list_2 = Arzt::findAll();
Core::publish($Arzt_list_2, "Arzt_list_2");
$Arzt_list=[];
$Arzt=new Arzt();
Arzt::$activeViewport="detail";
$Arzt->loadDBData($_GET["id"]);
Core::publish($Arzt, "Arzt");
//Beziehungen:
//Enumerationen
$Fachrichtung = FachrichtungT::findAll();
Core::publish($Fachrichtung, 'Fachrichtung');
//to: Termin  _a:
$Termin_a=new Termin();
$Termin_a_list=[];
$Termin_a_list = $Termin_a->query(Termin::SQL_SELECT_Arzt, [$Arzt->id]);
Core::publish($Termin_a_list, "Termin_a_list");
Core::publish($Termin_a, "Termin_a");
Core::$view->path["view_Termin_a"]="views/view.Termin_a_detail_overview.php";
