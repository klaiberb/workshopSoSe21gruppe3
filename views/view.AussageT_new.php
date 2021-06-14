<?php
$AussageT = Core::$view->AussageT;
$AussageT_list = Core::$view->AussageT_list ;
?>
<a href="?task=AussageT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_AussageT" method="post" action="?task=AussageT_new" data-ajax="false" enctype="<?=$AussageT::$enctype?>">
<div class="ui-field-contain">
<?php
$AussageT = Core::$view->AussageT;
$AussageT->renderLabel("id");
$AussageT->render("id");
$AussageT->renderLabel("c_ts");
$AussageT->render("c_ts");
$AussageT->renderLabel("m_ts");
$AussageT->render("m_ts");
$AussageT->renderLabel("literal");
$AussageT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
