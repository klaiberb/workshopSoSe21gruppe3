<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Termin_a_list = [];
Core::setView("Impfstoff_handle_Termin_a", "view1", "list");
Core::setViewScheme("view1", "list", "Termin_a");
Termin::$activeViewport="detail";
$Termin_a_list = Termin::findAll();
Core::publish($Termin_a_list, "Termin_a_list");
Core::publish($id, "id");
$Termin = new Termin();
Core::publish($Termin, "Termin");
if (isset($_id)) {
Termin::$activeViewport="detail";
$Termin->loadDBData($_id);
$Termin->_Impfstoff=$id;
$a=$Termin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
