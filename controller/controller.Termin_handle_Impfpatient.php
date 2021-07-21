<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impfpatient_list = [];
Core::setView("Termin_handle_Impfpatient", "view1", "list");
Core::setViewScheme("view1", "list", "Impfpatient");
$Impfpatient= new Impfpatient();
$Termin = new Termin();
Impfpatient::$activeViewport="detail";
$Impfpatient_list = Impfpatient::findAll();
Core::publish($Impfpatient, "Impfpatient");
Core::publish($Impfpatient_list, "Impfpatient_list");
Core::publish($id, "id");
if (isset($_id)) {
Termin::$activeViewport="detail";
$Termin->loadDBData($id);
$Termin->_Impfpatient=$_id;
$a=$Termin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Termin_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
