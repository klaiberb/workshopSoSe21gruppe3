<?php
class Impfstoff extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Bezeichnung;
public $Hersteller;
public $Zulassungsdatum;
public $Zulassungsstelle;
public $_Impfstoffart;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Impfstoff (_Impfstoffart, `Bezeichnung` , `Hersteller` , `Zulassungsdatum` , `Zulassungsstelle` ) VALUES (?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Impfstoff SET _Impfstoffart=?, `Bezeichnung` =?, `Hersteller` =?, `Zulassungsdatum` =?, `Zulassungsstelle` =? where id=?';
const SQL_SELECT_PK='SELECT Impfstoff.`c_ts` as `c_ts`, Impfstoff.`m_ts` as `m_ts`, Impfstoff.`id` as `id`, Impfstoff._Impfstoffart as _Impfstoffart, `Impfstoff`.`Bezeichnung` as `Bezeichnung`, `Impfstoff`.`Hersteller` as `Hersteller`, `Impfstoff`.`Zulassungsdatum` as `Zulassungsdatum`, `Impfstoff`.`Zulassungsstelle` as `Zulassungsstelle` from Impfstoff where Impfstoff.`id` = ?';
const SQL_SELECT_ALL='SELECT Impfstoff.`c_ts` as `c_ts`, Impfstoff.`m_ts` as `m_ts`, Impfstoff.`id` as `id`, Impfstoff._Impfstoffart as _Impfstoffart, `Impfstoff`.`Bezeichnung` as `Bezeichnung`, `Impfstoff`.`Hersteller` as `Hersteller`, `Impfstoff`.`Zulassungsdatum` as `Zulassungsdatum`, `Impfstoff`.`Zulassungsstelle` as `Zulassungsstelle` from Impfstoff';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Impfstoff.`c_ts` as `c_ts`, Impfstoff.`m_ts` as `m_ts`, Impfstoff.`id` as `id`, Impfstoff._Impfstoffart as _Impfstoffart, `Impfstoff`.`Bezeichnung` as `Bezeichnung`, `Impfstoff`.`Hersteller` as `Hersteller`, `Impfstoff`.`Zulassungsdatum` as `Zulassungsdatum`, `Impfstoff`.`Zulassungsstelle` as `Zulassungsstelle` from Impfstoff';
const SQL_DELETE='DELETE FROM Impfstoff WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Termin_a='select Impfstoff.id as id, Impfstoff.Bezeichnung as Bezeichnung, Impfstoff.Hersteller as Hersteller, Impfstoff.Zulassungsdatum as Zulassungsdatum, Impfstoff.Zulassungsstelle as Zulassungsstelle from Impfstoff where Impfstoff.id = ?';
const SQL_SELECT_Impfstoffart='select Impfstoff.id as id, Impfstoff.Bezeichnung as Bezeichnung, Impfstoff.Hersteller as Hersteller, Impfstoff.Zulassungsdatum as Zulassungsdatum, Impfstoff.Zulassungsstelle as Zulassungsstelle from Impfstoff where Impfstoff._Impfstoffart = ?';
}

Impfstoff::$dataScheme=db::buildScheme("Impfstoff");
$fp = fopen("models/json/Impfstoff_complete.json", "w");
fwrite($fp, json_encode(Impfstoff::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Impfstoff::$settings=db::loadSettings("Impfstoff");
$fp = fopen("models/json/Impfstoff_settings_complete.json", "w");
fwrite($fp, json_encode(Impfstoff::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
