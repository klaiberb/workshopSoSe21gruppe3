<?php
$taskType = "detail";
$classSettings =Impfstoff::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impfstoff";
Core::setView("Impfstoff_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impfstoff");
$Impfstoff_list_2 = Impfstoff::findAll();
Core::publish($Impfstoff_list_2, "Impfstoff_list_2");
$Impfstoff_list=[];
$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($_GET["id"]);
Core::publish($Impfstoff, "Impfstoff");
//Beziehungen:
//Enumerationen
//to: Termin  _a:
$Termin_a=new Termin();
$Termin_a_list=[];
$Termin_a_list = $Termin_a->query(Termin::SQL_SELECT_Impfstoff, [$Impfstoff->id]);
Core::publish($Termin_a_list, "Termin_a_list");
Core::publish($Termin_a, "Termin_a");
Core::$view->path["view_Termin_a"]="views/view.Termin_a_detail_overview.php";
//to: Impfstoffart  :
$Impfstoffart=new Impfstoffart();
$Impfstoffart_list=[];
$Impfstoffart_list = $Impfstoffart->query(Impfstoffart::SQL_SELECT_Impfstoff_a, [$Impfstoff->_Impfstoffart]);
Core::publish($Impfstoffart_list, "Impfstoffart_list");
Core::publish($Impfstoffart, "Impfstoffart");
Core::$view->path["view_Impfstoffart"]="views/view.Impfstoffart_detail_overview.php";
