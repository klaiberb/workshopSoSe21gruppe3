<?php
class DokumentartT extends DB{
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
const SQL_INSERT='INSERT INTO DokumentartT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE DokumentartT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT DokumentartT.* FROM DokumentartT WHERE id=?';
const SQL_SELECT_ALL='SELECT DokumentartT.* FROM DokumentartT';
const SQL_DELETE='DELETE FROM DokumentartT WHERE id=?';
const SQL_PRIMARY='id';
}
DokumentartT::$dataScheme=db::buildScheme("DokumentartT");
$fp = fopen("models/json/DokumentartT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("DokumentartT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
DokumentartT::$settings=db::loadSettings("DokumentartT");
$fp = fopen("models/json/DokumentartT_settings_complete.json", "w");
fwrite($fp, json_encode(DokumentartT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
