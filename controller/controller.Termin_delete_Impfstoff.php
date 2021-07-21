<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$Termin=new Termin();
Termin::$activeViewport="detail";
$Termin->loadDBData($schlüssel);
$Termin->_Impfstoff="";
$result=$Termin->update();
if($result){
Core::redirect("Termin_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::addError("Beziehung konnte nicht gelöscht werden, bitte beachte die Kardinalität");
}
}else{
Core::addError("Beziehung konnte nicht gelöscht werden");
}
