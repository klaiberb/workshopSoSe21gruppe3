<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$muss = $_GET["muss"];
if ($muss == "true") {
$partner = new Termin();
$partnerSQL = "Select * from Termin where _Arzt=$back";
$count = count($partner->findAll($partnerSQL));
if ($count > 1) {
$do = true;
} else {
$do = false;
}
} else {
$do = true;
}
if ($do == true) {
$Termin=new Termin();
Termin::$activeViewport="detail";
$Termin->loadDBData($schlüssel);
$Termin->_Arzt="";
$result=$Termin->update();
if($result){
Core::redirect("Arzt_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::redirect("Arzt_detail&id=$back", ["message"=>"Beziehung konnte nicht gelöscht werden"]);
}
}else{
Core::redirect("Arzt_detail&id=$back", ["message"=>"Das letzte Partner Objekt einer Muss Beziehung kann nicht entfernt werden."]);
}
}
