<?php
class Dokument extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Beschreibung;
public $Dokumentart;
public $Datei_upload;
public $Datei_path;
public $Datei_title;
public $_Impfpatient;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Dokument (_Impfpatient, `Beschreibung` , `Dokumentart` , `Datei_upload` , `Datei_path` , `Datei_title` ) VALUES (?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Dokument SET _Impfpatient=?, `Beschreibung` =?, `Dokumentart` =?, `Datei_upload` =?, `Datei_path` =?, `Datei_title` =? where id=?';
const SQL_SELECT_PK='SELECT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Impfpatient as _Impfpatient, `Dokument`.`Beschreibung` as `Beschreibung`, `DokumentartT0`.`literal` as `Dokumentart_literal`, `Dokument`.`Dokumentart` as `Dokumentart`, `Dokument`.`Datei_path` as `Datei_path`, `Dokument`.`Datei_title` as `Datei_title` from Dokument left join `DokumentartT` as DokumentartT0 on `Dokument`.`Dokumentart` = `DokumentartT0`.`id`  where Dokument.`id` = ?';
const SQL_SELECT_ALL='SELECT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Impfpatient as _Impfpatient, `Dokument`.`Beschreibung` as `Beschreibung`, `DokumentartT0`.`literal` as `Dokumentart_literal`, `Dokument`.`Dokumentart` as `Dokumentart`, `Dokument`.`Datei_path` as `Datei_path`, `Dokument`.`Datei_title` as `Datei_title` from Dokument left join `DokumentartT` as DokumentartT0 on `Dokument`.`Dokumentart` = `DokumentartT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Impfpatient as _Impfpatient, `Dokument`.`Beschreibung` as `Beschreibung`, `DokumentartT0`.`literal` as `Dokumentart_literal`, `Dokument`.`Dokumentart` as `Dokumentart`, `Dokument`.`Datei_path` as `Datei_path`, `Dokument`.`Datei_title` as `Datei_title` from Dokument left join `DokumentartT` as DokumentartT0 on `Dokument`.`Dokumentart` = `DokumentartT0`.`id` ';
const SQL_DELETE='DELETE FROM Dokument WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Impfpatient='select Dokument.id as id, Dokument.Beschreibung as Beschreibung, `DokumentartT0`.`literal` as `Dokumentart_literal`, `Dokument`.`Dokumentart` as `Dokumentart`, Dokument.Datei_path as Datei_path, Dokument.Datei_title as Datei_title from Dokument left join `DokumentartT` as DokumentartT0 on `Dokument`.`Dokumentart` = `DokumentartT0`.`id`  where Dokument._Impfpatient = ?';
}

Dokument::$dataScheme=db::buildScheme("Dokument");
$fp = fopen("models/json/Dokument_complete.json", "w");
fwrite($fp, json_encode(Dokument::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Dokument::$settings=db::loadSettings("Dokument");
$fp = fopen("models/json/Dokument_settings_complete.json", "w");
fwrite($fp, json_encode(Dokument::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
