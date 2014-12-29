<?
function recordsetPostProcess(&$aRecordset, $aControler)
{
  for ($i = 0, $l = count($aRecordset); $i < $l; $i++)
  {
    $lRecord = $aRecordset[$i];

    $lRecord['f_float_formated'] =
      number_format($lRecord['f_float'], 2, '.', '');

    $aRecordset[$i] = $lRecord;
  }
}

function recordPostProcess(&$aRecord, $aControler)
{
  $aRecord['f_integer_processed'] = (int)$aRecord['f_integer'] / 2;
}
?>