<?php
$Dokument = Core::$view->Dokument;
$Dokument_list = Core::$view->Dokument_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Dokument";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Dokument_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Dokument->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Dokument_edit&icon=<?=$icon?>&id=<?=$Dokument->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Dokument" method="post" action="?task=Dokument_edit&id=<?=$Dokument->id?>" data-ajax="false" enctype="<?=$Dokument::$enctype?>">
<div class="ui-field-contain">
<?php
$Dokument->renderLabel("id");
$Dokument->render("id");
$Dokument->renderLabel("c_ts");
$Dokument->render("c_ts");
$Dokument->renderLabel("m_ts");
$Dokument->render("m_ts");
$Dokument->renderLabel("Beschreibung");
$Dokument->render("Beschreibung");
$Dokument->renderLabel("Dokumentart");
$Dokument->render("Dokumentart");
$Dokument->renderLabel("Datei");
$Dokument->renderLabel("Datei_upload");
$Dokument->render("Datei_upload");
$Dokument->renderLabel("Datei_path");
$Dokument->render("Datei_path");
$Dokument->renderLabel("Datei_title");
$Dokument->render("Datei_title");
$Dokument->renderLabel("_Impfpatient");
$Dokument->render("_Impfpatient");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
