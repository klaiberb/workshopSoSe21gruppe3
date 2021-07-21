<?php
$taskType = "edit";
$classSettings =Dokument::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Dokument";
$id=$_GET["id"];
Core::setView("Dokument_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Dokument");
$Dokument=new Dokument();
Dokument::$activeViewport="edit";
$Dokument_list = Dokument::findAll();
Core::publish($Dokument_list, "Dokument_list");
Dokument::renderScript("edit","form_Dokument");
$Dokument->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Dokument->loadFormData();
if($a===true){
if($Dokument->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Dokument_field =Dokument::$dataScheme[$filekey];
switch ($Dokument_field["type"]){
case "picture":
$Dokument->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Dokument::$dataScheme[$Dokument_field["sysParent"]];
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
$pfad = $Dokument_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Dokument->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Dokument_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impfpatient = Impfpatient::findAll();
Core::publish($_Impfpatient, "_Impfpatient");
Core::publish($Dokument, "Dokument");
//Enumerationen
$Dokumentart = DokumentartT::findAll();
Core::publish($Dokumentart, 'Dokumentart');
