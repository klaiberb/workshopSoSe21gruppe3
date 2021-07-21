<?php
$Impfstoff = Core::$view->Impfstoff;
$Impfstoff_list = Core::$view->Impfstoff_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Impfstoff";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfstoff_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Impfstoff->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Impfstoff_edit&icon=<?=$icon?>&id=<?=$Impfstoff->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Impfstoff" method="post" action="?task=Impfstoff_edit&id=<?=$Impfstoff->id?>" data-ajax="false" enctype="<?=$Impfstoff::$enctype?>">
<div class="ui-field-contain">
<?php
$Impfstoff->renderLabel("id");
$Impfstoff->render("id");
$Impfstoff->renderLabel("c_ts");
$Impfstoff->render("c_ts");
$Impfstoff->renderLabel("m_ts");
$Impfstoff->render("m_ts");
$Impfstoff->renderLabel("Bezeichnung");
$Impfstoff->render("Bezeichnung");
$Impfstoff->renderLabel("Hersteller");
$Impfstoff->render("Hersteller");
$Impfstoff->renderLabel("Zulassungsdatum");
$Impfstoff->render("Zulassungsdatum");
$Impfstoff->renderLabel("Zulassungsstelle");
$Impfstoff->render("Zulassungsstelle");
$Impfstoff->renderLabel("_Impfstoffart");
$Impfstoff->render("_Impfstoffart");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
