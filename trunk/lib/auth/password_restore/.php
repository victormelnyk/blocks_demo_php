<?php
cPage::moduleAdd('blocks/lib/auth/password_restore/.php');

class cBlocksDemo_Auth_PasswordRestore extends cBlocks_Auth_PasswordRestore
{
  protected function mailSend($aLogin, $aPasswordNew, $aReportHtml)
  {
    p('MailSend '.$aLogin);
  }

  protected function onParamsCheckError()
  {
    p('ParamsCheckError');
  }

  protected function onSuccess()
  {
    p('Success');
  }

  protected function passwordUpdate($aUserId, $aParams)
  {
    $this->db->execute($this->db->sqlUpdateBuild('users',
      $aParams, array('id' => $aUserId)), $aParams);
  }

  protected function onPasswordUpdateError()
  {
    p('PasswordUpdateError');
  }

  protected function userIdGetCheck($aLogin, &$aUserId)
  {
    $lParams = array('login' => $aLogin);

    return $this->db->executeValue(
      $this->db->sqlSelectBuild('users', array('id'), $lParams),
      'id', $aUserId, $lParams);
  }
}
?>