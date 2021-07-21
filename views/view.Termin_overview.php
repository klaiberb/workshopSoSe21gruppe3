<?php
$Termin_list=Core::$view->Termin_list;
$Termin=Core::$view->Termin;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Termin",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Termin

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Termin&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Termin" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Termin->renderHeader("id", "table"); ?>
<?php $Termin->renderHeader("c_ts", "table"); ?>
<?php $Termin->renderHeader("m_ts", "table"); ?>
<?php $Termin->renderHeader("Datum", "table"); ?>
<?php $Termin->renderHeader("Aussage", "table"); ?>
<?php $Termin->renderHeader("_Impfpatient", "table"); ?>
<?php $Termin->renderHeader("_Impfstoff", "table"); ?>
<?php $Termin->renderHeader("_Arzt", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Termin_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Datum"); ?>
<?php $klasse->render("Aussage"); ?>
<?php $klasse->render("_Impfpatient"); ?>
<?php $klasse->render("_Impfstoff"); ?>
<?php $klasse->render("_Arzt"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Termin_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Termin_edit&id=<?=$klasse->id?>&task_source=Termin" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Termin_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
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
<a href="?task=Termin_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
