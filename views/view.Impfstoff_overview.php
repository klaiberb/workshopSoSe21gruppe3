<?php
$Impfstoff_list=Core::$view->Impfstoff_list;
$Impfstoff=Core::$view->Impfstoff;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impfstoff",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Impfstoff

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Impfstoff&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impfstoff" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Impfstoff->renderHeader("id", "table"); ?>
<?php $Impfstoff->renderHeader("c_ts", "table"); ?>
<?php $Impfstoff->renderHeader("m_ts", "table"); ?>
<?php $Impfstoff->renderHeader("Bezeichnung", "table"); ?>
<?php $Impfstoff->renderHeader("Hersteller", "table"); ?>
<?php $Impfstoff->renderHeader("Zulassungsdatum", "table"); ?>
<?php $Impfstoff->renderHeader("Zulassungsstelle", "table"); ?>
<?php $Impfstoff->renderHeader("_Impfstoffart", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Impfstoff_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Bezeichnung"); ?>
<?php $klasse->render("Hersteller"); ?>
<?php $klasse->render("Zulassungsdatum"); ?>
<?php $klasse->render("Zulassungsstelle"); ?>
<?php $klasse->render("_Impfstoffart"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Impfstoff_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Impfstoff_edit&id=<?=$klasse->id?>&task_source=Impfstoff" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Impfstoff_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
<?php } ?>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<?php if($access["new"] == "true"){ ?>
<a href="?task=Impfstoff_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
