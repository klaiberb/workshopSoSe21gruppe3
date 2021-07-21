<?php
$taskType = "edit";
$classSettings =Impfpatient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Impfpatient";
$id=$_GET["id"];
Core::setView("Impfpatient_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Impfpatient");
$Impfpatient=new Impfpatient();
Impfpatient::$activeViewport="edit";
$Impfpatient_list = Impfpatient::findAll();
Core::publish($Impfpatient_list, "Impfpatient_list");
Impfpatient::renderScript("edit","form_Impfpatient");
$Impfpatient->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Impfpatient->loadFormData();
if($a===true){
if($Impfpatient->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impfpatient_field =Impfpatient::$dataScheme[$filekey];
switch ($Impfpatient_field["type"]){
case "picture":
$Impfpatient->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impfpatient::$dataScheme[$Impfpatient_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:;
$ordner="files/";;
};
$pfad = $Impfpatient_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfpatient->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Impfpatient_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($Impfpatient, "Impfpatient");
//Enumerationen
