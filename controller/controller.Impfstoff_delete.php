<?php
$taskType = "delete";
$classSettings =Arzt::$settings;
Core::checkAccessGui($classSettings, $taskType);
if(isset($_GET['id'])){
$result=Impfstoff::delete(filter_input(INPUT_GET, "id"));
if($result){
Core::redirect("Impfstoff", ["message"=>"Löschvorgang erfolgreich"]);
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
