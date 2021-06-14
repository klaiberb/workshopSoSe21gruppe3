<?php
class Termin extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public static $access = true;
public $Datum;
public $Aussage;
public $_Impfpatient;
public $_Impfstoff;
public $_Arzt;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Termin (_Impfpatient, _Impfstoff, _Arzt, `Datum` , `Aussage` ) VALUES (?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Termin SET _Impfpatient=?, _Impfstoff=?, _Arzt=?, `Datum` =?, `Aussage` =? where id=?';
const SQL_SELECT_PK='SELECT Termin.`c_ts` as `c_ts`, Termin.`m_ts` as `m_ts`, Termin.`id` as `id`, Termin._Impfpatient as _Impfpatient, Termin._Impfstoff as _Impfstoff, Termin._Arzt as _Arzt, `Termin`.`Datum` as `Datum`, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id`  where Termin.`id` = ?';
const SQL_SELECT_ALL='SELECT Termin.`c_ts` as `c_ts`, Termin.`m_ts` as `m_ts`, Termin.`id` as `id`, Termin._Impfpatient as _Impfpatient, Termin._Impfstoff as _Impfstoff, Termin._Arzt as _Arzt, `Termin`.`Datum` as `Datum`, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Termin.`c_ts` as `c_ts`, Termin.`m_ts` as `m_ts`, Termin.`id` as `id`, Termin._Impfpatient as _Impfpatient, Termin._Impfstoff as _Impfstoff, Termin._Arzt as _Arzt, `Termin`.`Datum` as `Datum`, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id` ';
const SQL_DELETE='DELETE FROM Termin WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Impfpatient='select Termin.id as id, Termin.Datum as Datum, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id`  where Termin._Impfpatient = ?';
const SQL_SELECT_Impfstoff='select Termin.id as id, Termin.Datum as Datum, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id`  where Termin._Impfstoff = ?';
const SQL_SELECT_Arzt='select Termin.id as id, Termin.Datum as Datum, `AussageT0`.`literal` as `Aussage_literal`, `Termin`.`Aussage` as `Aussage` from Termin left join `AussageT` as AussageT0 on `Termin`.`Aussage` = `AussageT0`.`id`  where Termin._Arzt = ?';
}

Termin::$dataScheme=db::buildScheme("Termin");
$fp = fopen("models/json/Termin_complete.json", "w");
fwrite($fp, json_encode(Termin::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Termin::$settings=db::loadSettings("Termin");
$fp = fopen("models/json/Termin_settings_complete.json", "w");
fwrite($fp, json_encode(Termin::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
