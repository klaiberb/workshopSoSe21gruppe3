<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$muss = $_GET["muss"];
if ($muss == "true") {
$partner = new Impfstoff();
$partnerSQL = "Select * from Impfstoff where _Impfstoffart=$back";
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
$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($schlüssel);
$Impfstoff->_Impfstoffart="";
$result=$Impfstoff->update();
if($result){
Core::redirect("Impfstoffart_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::redirect("Impfstoffart_detail&id=$back", ["message"=>"Beziehung konnte nicht gelöscht werden"]);
}
}else{
Core::redirect("Impfstoffart_detail&id=$back", ["message"=>"Das letzte Partner Objekt einer Muss Beziehung kann nicht entfernt werden."]);
}
}
