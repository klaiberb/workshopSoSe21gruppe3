<?php
$taskType = "delete";
$classSettings =Arzt::$settings;
Core::checkAccessGui($classSettings, $taskType);
if(isset($_GET['id'])){
$result=Impfpatient::delete(filter_input(INPUT_GET, "id"));
if($result){
Core::redirect("Impfpatient", ["message"=>"Löschvorgang erfolgreich"]);
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
}else{
Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
