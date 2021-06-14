<?php
class Impfpatient extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Nachname;
public $Vorname;
public $Geburtsdatum;
public $Emailadresse;
public $Telefonnummer;
public $Adresse_Nachname;
public $Adresse_Vorname;
public $Adresse_Straße;
public $Adresse_Hausnummer;
public $Adresse_PLZ;
public $Adresse_Ort;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Impfpatient (`Nachname` , `Vorname` , `Geburtsdatum` , `Emailadresse` , `Telefonnummer` , `Adresse_Nachname` , `Adresse_Vorname` , `Adresse_Straße` , `Adresse_Hausnummer` , `Adresse_PLZ` , `Adresse_Ort` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Impfpatient SET `Nachname` =?, `Vorname` =?, `Geburtsdatum` =?, `Emailadresse` =?, `Telefonnummer` =?, `Adresse_Nachname` =?, `Adresse_Vorname` =?, `Adresse_Straße` =?, `Adresse_Hausnummer` =?, `Adresse_PLZ` =?, `Adresse_Ort` =? where id=?';
const SQL_SELECT_PK='SELECT Impfpatient.`c_ts` as `c_ts`, Impfpatient.`m_ts` as `m_ts`, Impfpatient.`id` as `id`, `Impfpatient`.`Nachname` as `Nachname`, `Impfpatient`.`Vorname` as `Vorname`, `Impfpatient`.`Geburtsdatum` as `Geburtsdatum`, `Impfpatient`.`Emailadresse` as `Emailadresse`, `Impfpatient`.`Telefonnummer` as `Telefonnummer`, `Impfpatient`.`Adresse_Nachname` as `Adresse_Nachname`, `Impfpatient`.`Adresse_Vorname` as `Adresse_Vorname`, `Impfpatient`.`Adresse_Straße` as `Adresse_Straße`, `Impfpatient`.`Adresse_Hausnummer` as `Adresse_Hausnummer`, `Impfpatient`.`Adresse_PLZ` as `Adresse_PLZ`, `Impfpatient`.`Adresse_Ort` as `Adresse_Ort` from Impfpatient where Impfpatient.`id` = ?';
const SQL_SELECT_ALL='SELECT Impfpatient.`c_ts` as `c_ts`, Impfpatient.`m_ts` as `m_ts`, Impfpatient.`id` as `id`, `Impfpatient`.`Nachname` as `Nachname`, `Impfpatient`.`Vorname` as `Vorname`, `Impfpatient`.`Geburtsdatum` as `Geburtsdatum`, `Impfpatient`.`Emailadresse` as `Emailadresse`, `Impfpatient`.`Telefonnummer` as `Telefonnummer`, `Impfpatient`.`Adresse_Nachname` as `Adresse_Nachname`, `Impfpatient`.`Adresse_Vorname` as `Adresse_Vorname`, `Impfpatient`.`Adresse_Straße` as `Adresse_Straße`, `Impfpatient`.`Adresse_Hausnummer` as `Adresse_Hausnummer`, `Impfpatient`.`Adresse_PLZ` as `Adresse_PLZ`, `Impfpatient`.`Adresse_Ort` as `Adresse_Ort` from Impfpatient';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Impfpatient.`c_ts` as `c_ts`, Impfpatient.`m_ts` as `m_ts`, Impfpatient.`id` as `id`, `Impfpatient`.`Nachname` as `Nachname`, `Impfpatient`.`Vorname` as `Vorname`, `Impfpatient`.`Geburtsdatum` as `Geburtsdatum`, `Impfpatient`.`Emailadresse` as `Emailadresse`, `Impfpatient`.`Telefonnummer` as `Telefonnummer`, `Impfpatient`.`Adresse_Nachname` as `Adresse_Nachname`, `Impfpatient`.`Adresse_Vorname` as `Adresse_Vorname`, `Impfpatient`.`Adresse_Straße` as `Adresse_Straße`, `Impfpatient`.`Adresse_Hausnummer` as `Adresse_Hausnummer`, `Impfpatient`.`Adresse_PLZ` as `Adresse_PLZ`, `Impfpatient`.`Adresse_Ort` as `Adresse_Ort` from Impfpatient';
const SQL_DELETE='DELETE FROM Impfpatient WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Termin_a='select Impfpatient.id as id, Impfpatient.Nachname as Nachname, Impfpatient.Vorname as Vorname, Impfpatient.Geburtsdatum as Geburtsdatum, Impfpatient.Emailadresse as Emailadresse, Impfpatient.Telefonnummer as Telefonnummer, Impfpatient.Adresse_Nachname as Adresse_Nachname, Impfpatient.Adresse_Vorname as Adresse_Vorname, Impfpatient.Adresse_Straße as Adresse_Straße, Impfpatient.Adresse_Hausnummer as Adresse_Hausnummer, Impfpatient.Adresse_PLZ as Adresse_PLZ, Impfpatient.Adresse_Ort as Adresse_Ort from Impfpatient where Impfpatient.id = ?';
const SQL_SELECT_Dokument_b='select Impfpatient.id as id, Impfpatient.Nachname as Nachname, Impfpatient.Vorname as Vorname, Impfpatient.Geburtsdatum as Geburtsdatum, Impfpatient.Emailadresse as Emailadresse, Impfpatient.Telefonnummer as Telefonnummer, Impfpatient.Adresse_Nachname as Adresse_Nachname, Impfpatient.Adresse_Vorname as Adresse_Vorname, Impfpatient.Adresse_Straße as Adresse_Straße, Impfpatient.Adresse_Hausnummer as Adresse_Hausnummer, Impfpatient.Adresse_PLZ as Adresse_PLZ, Impfpatient.Adresse_Ort as Adresse_Ort from Impfpatient where Impfpatient.id = ?';
}

Impfpatient::$dataScheme=db::buildScheme("Impfpatient");
$fp = fopen("models/json/Impfpatient_complete.json", "w");
fwrite($fp, json_encode(Impfpatient::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Impfpatient::$settings=db::loadSettings("Impfpatient");
$fp = fopen("models/json/Impfpatient_settings_complete.json", "w");
fwrite($fp, json_encode(Impfpatient::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
