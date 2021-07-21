<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impfstoffart_list = [];
Core::setView("Impfstoff_handle_Impfstoffart", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoffart");
$Impfstoffart= new Impfstoffart();
$Impfstoff = new Impfstoff();
Impfstoffart::$activeViewport="detail";
$Impfstoffart_list = Impfstoffart::findAll();
Core::publish($Impfstoffart, "Impfstoffart");
Core::publish($Impfstoffart_list, "Impfstoffart_list");
Core::publish($id, "id");
if (isset($_id)) {
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($id);
$Impfstoff->_Impfstoffart=$_id;
$a=$Impfstoff->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Impfstoff_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
