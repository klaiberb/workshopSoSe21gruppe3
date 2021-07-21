<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Dokument_b_list = [];
Core::setView("Impfpatient_handle_Dokument_b", "view1", "list");
Core::setViewScheme("view1", "list", "Dokument_b");
Dokument::$activeViewport="detail";
$Dokument_b_list = Dokument::findAll();
Core::publish($Dokument_b_list, "Dokument_b_list");
Core::publish($id, "id");
$Dokument = new Dokument();
Core::publish($Dokument, "Dokument");
if (isset($_id)) {
Dokument::$activeViewport="detail";
$Dokument->loadDBData($_id);
$Dokument->_Impfpatient=$id;
$a=$Dokument->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
