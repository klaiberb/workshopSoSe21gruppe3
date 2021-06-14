<?php
Core::checkAccessLevel(1);
Core::$title="Neu: FachrichtungT";
Core::setView("FachrichtungT_new", "view1", "new");
Core::setViewScheme("view1", "new", "FachrichtungT");
$FachrichtungT=new FachrichtungT();
FachrichtungT::$activeViewport="new";
$FachrichtungT_list = FachrichtungT::findAll();
Core::publish($FachrichtungT_list, "FachrichtungT_list");
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $FachrichtungT->loadFormData();
if($a===true){
if($FachrichtungT->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$FachrichtungT_field =FachrichtungT::$dataScheme[$filekey];
switch ($FachrichtungT_field["type"]){
case "picture":
$FachrichtungT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=FachrichtungT::$dataScheme[$FachrichtungT_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:
$ordner="files/";
}
$pfad = $FachrichtungT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$FachrichtungT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$FachrichtungT=new FachrichtungT();
Core::$view->path["view1"]="views/view.FachrichtungT_new.php";
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($FachrichtungT, "FachrichtungT");
