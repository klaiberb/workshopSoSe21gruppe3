<?php
$taskType = "edit";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Arzt";
$id=$_GET["id"];
Core::setView("Arzt_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Arzt");
$Arzt=new Arzt();
Arzt::$activeViewport="edit";
$Arzt_list = Arzt::findAll();
Core::publish($Arzt_list, "Arzt_list");
Arzt::renderScript("edit","form_Arzt");
$Arzt->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Arzt->loadFormData();
if($a===true){
if($Arzt->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Arzt_field =Arzt::$dataScheme[$filekey];
switch ($Arzt_field["type"]){
case "picture":
$Arzt->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Arzt::$dataScheme[$Arzt_field["sysParent"]];
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
$pfad = $Arzt_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Arzt->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Arzt_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($Arzt, "Arzt");
//Enumerationen
$Fachrichtung = FachrichtungT::findAll();
Core::publish($Fachrichtung, 'Fachrichtung');
