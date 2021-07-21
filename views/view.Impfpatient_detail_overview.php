<?php
$Impfpatient_list=Core::$view->Impfpatient_list;
$Impfpatient=Core::$view->Impfpatient;
$Dokument=Core::$view->Dokument;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Impfpatient <a href="#popup_Impfpatient" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Impfpatient" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Dokument (*..*) ---- (1..1) Impfpatient <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Dokument) muss genau eine Verbindung zu einem Objekt der Partnerklasse (Impfpatient) haben (1..1).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Das Partnerobjekt kann mehrere Verbindungen zu den Objekten aus dieser Klasse haben (*..*).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<div class="ui-field-contain">
<?php foreach($Impfpatient_list as $klasse){
$partner=true;
$klasse->renderLabel("id", "detail");
$klasse->render("id", "detail");
$klasse->renderLabel("c_ts", "detail");
$klasse->render("c_ts", "detail");
$klasse->renderLabel("m_ts", "detail");
$klasse->render("m_ts", "detail");
$klasse->renderLabel("Nachname", "detail");
$klasse->render("Nachname", "detail");
$klasse->renderLabel("Vorname", "detail");
$klasse->render("Vorname", "detail");
$klasse->renderLabel("Geburtsdatum", "detail");
$klasse->render("Geburtsdatum", "detail");
$klasse->renderLabel("Emailadresse", "detail");
$klasse->render("Emailadresse", "detail");
$klasse->renderLabel("Telefonnummer", "detail");
$klasse->render("Telefonnummer", "detail");
$klasse->renderLabel("Adresse_Nachname", "detail");
$klasse->render("Adresse_Nachname", "detail");
$klasse->renderLabel("Adresse_Vorname", "detail");
$klasse->render("Adresse_Vorname", "detail");
$klasse->renderLabel("Adresse_Straße", "detail");
$klasse->render("Adresse_Straße", "detail");
$klasse->renderLabel("Adresse_Hausnummer", "detail");
$klasse->render("Adresse_Hausnummer", "detail");
$klasse->renderLabel("Adresse_PLZ", "detail");
$klasse->render("Adresse_PLZ", "detail");
$klasse->renderLabel("Adresse_Ort", "detail");
$klasse->render("Adresse_Ort", "detail");
}
if($partner!==true){
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</div>
