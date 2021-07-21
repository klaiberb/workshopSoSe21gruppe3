<?php
$Impfstoffart_list=Core::$view->Impfstoffart_list;
$id=Core::$view->id;
$Impfstoffart=Core::$view->Impfstoffart;
?>
<div id="custom-border-radius">
<a href="?task=Impfstoff_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Impfstoffart hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impfstoff" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Impfstoffart->renderHeader("id", "table"); ?>
<?php $Impfstoffart->renderHeader("c_ts", "table"); ?>
<?php $Impfstoffart->renderHeader("m_ts", "table"); ?>
<?php $Impfstoffart->renderHeader("Bezeichnung", "table"); ?>
<?php $Impfstoffart->renderHeader("Beschreibung", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($Impfstoffart_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Bezeichnung"); ?>
<?php $klasse->render("Beschreibung"); ?>
<td>
<form method="post" action="?task=Impfstoff_handle_Impfstoffart&id=<?=$id?>" data-ajax="false">
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
