<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impfstoff_list = [];
Core::setView("Termin_handle_Impfstoff", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoff");
$Impfstoff= new Impfstoff();
$Termin = new Termin();
Impfstoff::$activeViewport="detail";
$Impfstoff_list = Impfstoff::findAll();
Core::publish($Impfstoff, "Impfstoff");
Core::publish($Impfstoff_list, "Impfstoff_list");
Core::publish($id, "id");
if (isset($_id)) {
Termin::$activeViewport="detail";
$Termin->loadDBData($id);
$Termin->_Impfstoff=$_id;
$a=$Termin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Termin_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
