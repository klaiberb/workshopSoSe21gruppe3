<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impfstoff_a_list = [];
Core::setView("Impfstoffart_handle_Impfstoff_a", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoff_a");
Impfstoff::$activeViewport="detail";
$Impfstoff_a_list = Impfstoff::findAll();
Core::publish($Impfstoff_a_list, "Impfstoff_a_list");
Core::publish($id, "id");
$Impfstoff = new Impfstoff();
Core::publish($Impfstoff, "Impfstoff");
if (isset($_id)) {
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($_id);
$Impfstoff->_Impfstoffart=$id;
$a=$Impfstoff->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
