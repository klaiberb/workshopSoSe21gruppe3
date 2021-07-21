<?php
$taskType = "edit";
$classSettings =Impfstoff::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Impfstoff";
$id=$_GET["id"];
Core::setView("Impfstoff_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Impfstoff");
$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="edit";
$Impfstoff_list = Impfstoff::findAll();
Core::publish($Impfstoff_list, "Impfstoff_list");
Impfstoff::renderScript("edit","form_Impfstoff");
$Impfstoff->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Impfstoff->loadFormData();
if($a===true){
if($Impfstoff->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impfstoff_field =Impfstoff::$dataScheme[$filekey];
switch ($Impfstoff_field["type"]){
case "picture":
$Impfstoff->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impfstoff::$dataScheme[$Impfstoff_field["sysParent"]];
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
$pfad = $Impfstoff_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfstoff->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Impfstoff_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impfstoffart = Impfstoffart::findAll();
Core::publish($_Impfstoffart, "_Impfstoffart");
Core::publish($Impfstoff, "Impfstoff");
//Enumerationen
