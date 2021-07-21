<?php
$taskType = "edit";
$classSettings =Termin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Termin";
$id=$_GET["id"];
Core::setView("Termin_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Termin");
$Termin=new Termin();
Termin::$activeViewport="edit";
$Termin_list = Termin::findAll();
Core::publish($Termin_list, "Termin_list");
Termin::renderScript("edit","form_Termin");
$Termin->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Termin->loadFormData();
if($a===true){
if($Termin->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Termin_field =Termin::$dataScheme[$filekey];
switch ($Termin_field["type"]){
case "picture":
$Termin->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Termin::$dataScheme[$Termin_field["sysParent"]];
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
$pfad = $Termin_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Termin->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Termin_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impfpatient = Impfpatient::findAll();
Core::publish($_Impfpatient, "_Impfpatient");
$_Impfstoff = Impfstoff::findAll();
Core::publish($_Impfstoff, "_Impfstoff");
$_Arzt = Arzt::findAll();
Core::publish($_Arzt, "_Arzt");
Core::publish($Termin, "Termin");
//Enumerationen
$Aussage = AussageT::findAll();
Core::publish($Aussage, 'Aussage');
