<?php
$Dokument_b_list=Core::$view->Dokument_b_list;
$Dokument_b=Core::$view->Dokument_b;
$Impfpatient=Core::$view->Impfpatient;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Dokument <a href="#popup_Dokument_b" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Dokument_b" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Impfpatient (1..1) ---- (*..*) Dokument <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Impfpatient) kann mehrere Verbindungen zu Objekten der Partnerklasse (Dokument) haben (*..*).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Es ist zu beachten, dass das Partnerobjekt genau eine Verbindung zu einem Objekt dieser Klasse haben muss (1..1).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<?php
if(!empty($Dokument_b_list)){
?>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Dokument_b" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Dokument_b->renderHeader("id", "table"); ?>
<?php $Dokument_b->renderHeader("c_ts", "table"); ?>
<?php $Dokument_b->renderHeader("m_ts", "table"); ?>
<?php $Dokument_b->renderHeader("Beschreibung", "table"); ?>
<?php $Dokument_b->renderHeader("Dokumentart", "table"); ?>
<?php $Dokument_b->renderHeader("Datei_upload", "table"); ?>
<?php $Dokument_b->renderHeader("Datei_path", "table"); ?>
<?php $Dokument_b->renderHeader("Datei_title", "table"); ?>
<?php $Dokument_b->renderHeader("_Impfpatient", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Dokument_b_list as $klasse){
?>
<tr>
<?php $klasse->render("id", "list"); ?>
<?php $klasse->render("c_ts", "list"); ?>
<?php $klasse->render("m_ts", "list"); ?>
<?php $klasse->render("Beschreibung", "list"); ?>
<?php $klasse->render("Dokumentart", "list"); ?>
<?php $klasse->render("Datei_upload", "list"); ?>
<?php $klasse->render("Datei_path", "list"); ?>
<?php $klasse->render("Datei_title", "list"); ?>
<?php $klasse->render("_Impfpatient", "list"); ?>
<td>
<a href="?task=Impfpatient_delete_Dokument_b&id=<?=$klasse->id?>&back=<?=$Impfpatient->id?>&muss=false" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
</td>
</td>
</tr>
<?php }
}else{
echo"<div>";
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</tbody>
</table>
</div>
