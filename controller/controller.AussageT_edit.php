<?php
Core::checkAccessLevel(1);
Core::$title="Edit: AussageT";
$id=$_GET["id"];
Core::setView("AussageT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "AussageT");
$AussageT=new AussageT();
AussageT::$activeViewport="edit";
$AussageT_list = AussageT::findAll();
Core::publish($AussageT_list, "AussageT_list");
AussageT::$activeViewport="edit";
$AussageT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $AussageT->loadFormData();
if($a===true){
if($AussageT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$AussageT_field =AussageT::$dataScheme[$filekey];
switch ($AussageT_field["type"]){
case "picture":
$AussageT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=AussageT::$dataScheme[$AussageT_field["sysParent"]];
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
$pfad = $AussageT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$AussageT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("AussageT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($AussageT, "AussageT");
