<?php
$Dokument_b_list=Core::$view->Dokument_b_list;
$id=Core::$view->id;
$Dokument=Core::$view->Dokument;
?>
<div id="custom-border-radius">
<a href="?task=Impfpatient_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Dokument hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impfpatient" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Dokument->renderHeader("id", "table"); ?>
<?php $Dokument->renderHeader("c_ts", "table"); ?>
<?php $Dokument->renderHeader("m_ts", "table"); ?>
<?php $Dokument->renderHeader("Beschreibung", "table"); ?>
<?php $Dokument->renderHeader("Dokumentart", "table"); ?>
<?php $Dokument->renderHeader("Datei_upload", "table"); ?>
<?php $Dokument->renderHeader("Datei_path", "table"); ?>
<?php $Dokument->renderHeader("Datei_title", "table"); ?>
<?php $Dokument->renderHeader("_Impfpatient", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($Dokument_b_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Beschreibung"); ?>
<?php $klasse->render("Dokumentart"); ?>
<?php $klasse->render("Datei_upload"); ?>
<?php $klasse->render("Datei_path"); ?>
<?php $klasse->render("Datei_title"); ?>
<?php $klasse->render("_Impfpatient"); ?>
<td>
<form method="post" action="?task=Impfpatient_handle_Dokument_b&id=<?=$id?>" data-ajax="false">
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
