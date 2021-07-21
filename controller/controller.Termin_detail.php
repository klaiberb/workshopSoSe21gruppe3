<?php
$taskType = "detail";
$classSettings =Termin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Termin";
Core::setView("Termin_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Termin");
$Termin_list_2 = Termin::findAll();
Core::publish($Termin_list_2, "Termin_list_2");
$Termin_list=[];
$Termin=new Termin();
Termin::$activeViewport="detail";
$Termin->loadDBData($_GET["id"]);
Core::publish($Termin, "Termin");
//Beziehungen:
//Enumerationen
$Aussage = AussageT::findAll();
Core::publish($Aussage, 'Aussage');
//to: Impfpatient  :
$Impfpatient=new Impfpatient();
$Impfpatient_list=[];
$Impfpatient_list = $Impfpatient->query(Impfpatient::SQL_SELECT_Termin_a, [$Termin->_Impfpatient]);
Core::publish($Impfpatient_list, "Impfpatient_list");
Core::publish($Impfpatient, "Impfpatient");
Core::$view->path["view_Impfpatient"]="views/view.Impfpatient_detail_overview.php";
//to: Impfstoff  :
$Impfstoff=new Impfstoff();
$Impfstoff_list=[];
$Impfstoff_list = $Impfstoff->query(Impfstoff::SQL_SELECT_Termin_a, [$Termin->_Impfstoff]);
Core::publish($Impfstoff_list, "Impfstoff_list");
Core::publish($Impfstoff, "Impfstoff");
Core::$view->path["view_Impfstoff"]="views/view.Impfstoff_detail_overview.php";
//to: Arzt  :
$Arzt=new Arzt();
$Arzt_list=[];
$Arzt_list = $Arzt->query(Arzt::SQL_SELECT_Termin_a, [$Termin->_Arzt]);
Core::publish($Arzt_list, "Arzt_list");
Core::publish($Arzt, "Arzt");
Core::$view->path["view_Arzt"]="views/view.Arzt_detail_overview.php";
