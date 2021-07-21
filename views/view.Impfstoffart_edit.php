<?php
$Impfstoffart = Core::$view->Impfstoffart;
$Impfstoffart_list = Core::$view->Impfstoffart_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Impfstoffart";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfstoffart_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Impfstoffart->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Impfstoffart_edit&icon=<?=$icon?>&id=<?=$Impfstoffart->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Impfstoffart" method="post" action="?task=Impfstoffart_edit&id=<?=$Impfstoffart->id?>" data-ajax="false" enctype="<?=$Impfstoffart::$enctype?>">
<div class="ui-field-contain">
<?php
$Impfstoffart->renderLabel("id");
$Impfstoffart->render("id");
$Impfstoffart->renderLabel("c_ts");
$Impfstoffart->render("c_ts");
$Impfstoffart->renderLabel("m_ts");
$Impfstoffart->render("m_ts");
$Impfstoffart->renderLabel("Bezeichnung");
$Impfstoffart->render("Bezeichnung");
$Impfstoffart->renderLabel("Beschreibung");
$Impfstoffart->render("Beschreibung");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
