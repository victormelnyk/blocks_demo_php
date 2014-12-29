<?php
require_once('../../../../blocks/comp/common/tools.php');
require_once('../../../../blocks/comp/common/db.php');

$db = new DbPGSql('localhost', 'b_admin', 'b_admin', 'blocks');

p('beginTran commitTran<br>');
$db->beginTran();
$db->commitTran();

p('beginTran rollbackTran<br>');
$db->beginTran();
$db->rollbackTran();

p('execute<br>');
$sql =
  'INSERT INTO bl.bl_types (f_integer)' . CRLF .
  'VALUES (:f_integer)';
$params = array('f_integer' => 5);
var_dump($sql, $params);
$db->beginTran();
$db->execute($sql, $params);
$db->rollbackTran();

p('executeRecord<br>');
$sql =
  'SELECT *' . CRLF .
  'FROM bl.bl_types' . CRLF .
  'WHERE f_id = :f_id';
$params = array('f_id' => 1);
$fieldTypes = array('f_money' => V_FLOAT);
$record = array();
$db->executeRecord($sql, $record, $params, $fieldTypes);
var_dump($sql, $params, $fieldTypes, $record);

p('executeRecordset<br>');
$sql =
  'SELECT *' . CRLF .
  'FROM bl.bl_types' . CRLF .
  'WHERE f_id < :f_id';
$params = array('f_id' => 50);
$fieldTypes = array('f_money' => V_FLOAT);
$recordset = array();
$db->executeRecordset($sql, $recordset, $params, $fieldTypes);
var_dump($sql, $params, $fieldTypes, $recordset);

p('executeValue<br>');
$sql =
  'SELECT f_money' . CRLF .
  'FROM bl.bl_types' . CRLF .
  'WHERE f_id = :f_id';
$params = array('f_id' => 1);
$value = 0;
$db->executeValue($sql, 'f_money', $value, $params, V_FLOAT);
var_dump($sql, $params, $value);

p('buildSelectSql<br>');
$fieldNames = array('f_id', 'f_money');
$whereParams = array('f_id' => 1);
$sql = $db->buildSelectSql('bl.bl_types', $fieldNames, $whereParams);
var_dump($fieldNames, $whereParams, $sql);

p('buildDeleteSql<br>');
$whereParams = array('f_id' => 1);
$sql = $db->buildDeleteSql('bl.bl_types', $whereParams);
var_dump($whereParams, $sql);

p('buildInsertSql<br>');
$params = array('f_id' => 1);
$sql = $db->buildInsertSql('bl.bl_types', $params);
var_dump($params, $sql);

p('buildUpdateSql<br>');
$params = array('f_money' => 5.4);
$whereParams = array('f_id' => 1);
$sql = $db->buildUpdateSql('bl.bl_types', $params, $whereParams);
var_dump($params, $whereParams, $sql);
?>