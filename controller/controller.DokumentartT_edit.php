<?php
Core::checkAccessLevel(1);
Core::$title="Edit: DokumentartT";
$id=$_GET["id"];
Core::setView("DokumentartT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "DokumentartT");
$DokumentartT=new DokumentartT();
DokumentartT::$activeViewport="edit";
$DokumentartT_list = DokumentartT::findAll();
Core::publish($DokumentartT_list, "DokumentartT_list");
DokumentartT::$activeViewport="edit";
$DokumentartT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $DokumentartT->loadFormData();
if($a===true){
if($DokumentartT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$DokumentartT_field =DokumentartT::$dataScheme[$filekey];
switch ($DokumentartT_field["type"]){
case "picture":
$DokumentartT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=DokumentartT::$dataScheme[$DokumentartT_field["sysParent"]];
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
$pfad = $DokumentartT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$DokumentartT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("DokumentartT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($DokumentartT, "DokumentartT");
