<?php
$Arzt_list=Core::$view->Arzt_list;
$Arzt=Core::$view->Arzt;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Arzt",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Arzt

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Arzt&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Arzt" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Arzt->renderHeader("id", "table"); ?>
<?php $Arzt->renderHeader("c_ts", "table"); ?>
<?php $Arzt->renderHeader("m_ts", "table"); ?>
<?php $Arzt->renderHeader("Nachname", "table"); ?>
<?php $Arzt->renderHeader("Vorname", "table"); ?>
<?php $Arzt->renderHeader("Emailadresse", "table"); ?>
<?php $Arzt->renderHeader("Telefonnummer", "table"); ?>
<?php $Arzt->renderHeader("Fachrichtung", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Arzt_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Nachname"); ?>
<?php $klasse->render("Vorname"); ?>
<?php $klasse->render("Emailadresse"); ?>
<?php $klasse->render("Telefonnummer"); ?>
<?php $klasse->render("Fachrichtung"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Arzt_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Arzt_edit&id=<?=$klasse->id?>&task_source=Arzt" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Arzt_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
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
<a href="?task=Arzt_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
