<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Impfstoffart";
Core::setView("Impfstoffart_new", "view1", "new");
Core::setViewScheme("view1", "new", "Impfstoffart");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Impfstoffart=new Impfstoffart();
Impfstoffart::$activeViewport="new";
Impfstoffart::renderScript("new","form_Impfstoffart");

if(count($_POST)>0){
$a= $Impfstoffart->loadFormData();
if($a===true){
if($Impfstoffart->create()!="0"){
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
default:
$ordner="files/";
}
$pfad = $Impfstoffart_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impfstoffart->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Impfstoffart=new Impfstoffart();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Impfstoffart_new.php";
}else{
   $task_source = $_GET["task_source"];
   Core::redirect ($task_source);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($Impfstoffart, "Impfstoffart");
//Enumerationen
