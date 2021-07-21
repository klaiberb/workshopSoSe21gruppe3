<?php
$taskType = "detail";
$classSettings =Impfstoffart::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impfstoffart";
Core::setView("Impfstoffart_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impfstoffart");
$Impfstoffart_list_2 = Impfstoffart::findAll();
Core::publish($Impfstoffart_list_2, "Impfstoffart_list_2");
$Impfstoffart_list=[];
$Impfstoffart=new Impfstoffart();
Impfstoffart::$activeViewport="detail";
$Impfstoffart->loadDBData($_GET["id"]);
Core::publish($Impfstoffart, "Impfstoffart");
//Beziehungen:
//Enumerationen
//to: Impfstoff  _a:
$Impfstoff_a=new Impfstoff();
$Impfstoff_a_list=[];
$Impfstoff_a_list = $Impfstoff_a->query(Impfstoff::SQL_SELECT_Impfstoffart, [$Impfstoffart->id]);
Core::publish($Impfstoff_a_list, "Impfstoff_a_list");
Core::publish($Impfstoff_a, "Impfstoff_a");
Core::$view->path["view_Impfstoff_a"]="views/view.Impfstoff_a_detail_overview.php";
