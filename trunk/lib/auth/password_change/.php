<?
Page::addModule('blocks/lib/auth/password_change/.php');

class BlocksDemo_Auth_PasswordChange extends Blocks_Auth_PasswordChange
{
  protected function onError($aErrorType)
  {
    p('Error '.$aErrorType);
  }

  protected function onSuccess()
  {
    p('Success');
  }

  protected function passwordInfoReadCheck($aDb, $aUserId, &$aPassword,
    &$aRandomPart)
  {
    $lWhereParams = array('id' => $aUserId);
    $lResult = $aDb->executeRecord($aDb->sqlSelectBuild('users',
      array('password, random_part'), $lWhereParams), $lRecord, $lWhereParams);

    if ($lResult)
    {
      $aPassword   = $lRecord['password'];
      $aRandomPart = $lRecord['random_part'];
    }

    return $lResult;
  }

  protected function passwordInfoSave($aDb, $aUserId, $aPassword, $aRandomPart)
  {
    $lParams['random_part'] = $aRandomPart;
    $lParams['password']    = $aPassword;

    $lWhereParams = array('id' => $aUserId);

    $aDb->execute($aDb->sqlUpdateBuild('users', $lParams, $lWhereParams),
      $lParams);
  }
}
?>