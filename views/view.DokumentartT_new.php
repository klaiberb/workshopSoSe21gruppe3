<?php
$DokumentartT = Core::$view->DokumentartT;
$DokumentartT_list = Core::$view->DokumentartT_list ;
?>
<a href="?task=DokumentartT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_DokumentartT" method="post" action="?task=DokumentartT_new" data-ajax="false" enctype="<?=$DokumentartT::$enctype?>">
<div class="ui-field-contain">
<?php
$DokumentartT = Core::$view->DokumentartT;
$DokumentartT->renderLabel("id");
$DokumentartT->render("id");
$DokumentartT->renderLabel("c_ts");
$DokumentartT->render("c_ts");
$DokumentartT->renderLabel("m_ts");
$DokumentartT->render("m_ts");
$DokumentartT->renderLabel("literal");
$DokumentartT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
