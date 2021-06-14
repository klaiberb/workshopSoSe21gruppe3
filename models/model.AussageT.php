<?php
class AussageT extends DB{
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
const SQL_INSERT='INSERT INTO AussageT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE AussageT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT AussageT.* FROM AussageT WHERE id=?';
const SQL_SELECT_ALL='SELECT AussageT.* FROM AussageT';
const SQL_DELETE='DELETE FROM AussageT WHERE id=?';
const SQL_PRIMARY='id';
}
AussageT::$dataScheme=db::buildScheme("AussageT");
$fp = fopen("models/json/AussageT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("AussageT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
AussageT::$settings=db::loadSettings("AussageT");
$fp = fopen("models/json/AussageT_settings_complete.json", "w");
fwrite($fp, json_encode(AussageT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
