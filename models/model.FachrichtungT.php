<?php
class FachrichtungT extends DB{
//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public $literal;
public $sort;
public static $settings=array();
public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
//Konstanten
const SQL_INSERT='INSERT INTO FachrichtungT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE FachrichtungT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT FachrichtungT.* FROM FachrichtungT WHERE id=?';
const SQL_SELECT_ALL='SELECT FachrichtungT.* FROM FachrichtungT';
const SQL_DELETE='DELETE FROM FachrichtungT WHERE id=?';
const SQL_PRIMARY='id';
}
FachrichtungT::$dataScheme=db::buildScheme("FachrichtungT");
$fp = fopen("models/json/FachrichtungT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("FachrichtungT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
FachrichtungT::$settings=db::loadSettings("FachrichtungT");
$fp = fopen("models/json/FachrichtungT_settings_complete.json", "w");
fwrite($fp, json_encode(FachrichtungT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
