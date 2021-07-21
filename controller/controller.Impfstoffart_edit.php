<?php
$taskType = "edit";
$classSettings =Impfstoffart::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Impfstoffart";
$id=$_GET["id"];
Core::setView("Impfstoffart_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Impfstoffart");
$Impfstoffart=new Impfstoffart();
Impfstoffart::$activeViewport="edit";
$Impfstoffart_list = Impfstoffart::findAll();
Core::publish($Impfstoffart_list, "Impfstoffart_list");
Impfstoffart::renderScript("edit","form_Impfstoffart");
$Impfstoffart->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Impfstoffart->loadFormData();
if($a===true){
if($Impfstoffart->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impfstoffart_field =Impfstoffart::$dataScheme[$filekey];
switch ($Impfstoffart_field["type"]){
case "picture":
$Impfstoffart->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impfstoffart::$dataScheme[$Impfstoffart_field["sysParent"]];
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
$pfad = $Impfstoffart_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfstoffart->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Impfstoffart_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($Impfstoffart, "Impfstoffart");
//Enumerationen
