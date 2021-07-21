<?php
$Impfstoff_list=Core::$view->Impfstoff_list;
$id=Core::$view->id;
$Impfstoff=Core::$view->Impfstoff;
?>
<div id="custom-border-radius">
<a href="?task=Termin_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Impfstoff hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Termin" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
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
<form method="post" action="?task=Termin_handle_Impfstoff&id=<?=$id?>" data-ajax="false">
<input type="hidden" name="_id" value="<?=$klasse->id?>">
<button type="submit" name="add" id="add" value="1" class="ui-btn ui-icon-plus ui-btn-icon-notext ui-corner-all ui-btn-inline">add</button>
</form>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<br>
