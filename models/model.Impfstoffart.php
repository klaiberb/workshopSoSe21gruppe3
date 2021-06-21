<?php
class Impfstoffart extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Bezeichnung;
public $Beschreibung;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Impfstoffart (`Bezeichnung` , `Beschreibung` ) VALUES (?, ?)';
const SQL_UPDATE='UPDATE Impfstoffart SET `Bezeichnung` =?, `Beschreibung` =? where id=?';
const SQL_SELECT_PK='SELECT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `Impfstoffart`.`Bezeichnung` as `Bezeichnung`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart where Impfstoffart.`id` = ?';
const SQL_SELECT_ALL='SELECT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `Impfstoffart`.`Bezeichnung` as `Bezeichnung`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `Impfstoffart`.`Bezeichnung` as `Bezeichnung`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart';
const SQL_DELETE='DELETE FROM Impfstoffart WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Impfstoff_a='select Impfstoffart.id as id, Impfstoffart.Bezeichnung as Bezeichnung, Impfstoffart.Beschreibung as Beschreibung from Impfstoffart where Impfstoffart.id = ?';
}

Impfstoffart::$dataScheme=db::buildScheme("Impfstoffart");
$fp = fopen("models/json/Impfstoffart_complete.json", "w");
fwrite($fp, json_encode(Impfstoffart::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Impfstoffart::$settings=db::loadSettings("Impfstoffart");
$fp = fopen("models/json/Impfstoffart_settings_complete.json", "w");
fwrite($fp, json_encode(Impfstoffart::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
