<?php
cPage::moduleAdd('blocks/comp/helpers/crypt/1/.php');
cPage::moduleAdd('blocks/comp/logon_context/.php');

class cBlocksDemo_LogonContext extends cLogonContext
{
  protected function readFromDb($aUserLogin, $aUserPassword)
  {
    $lWhereParams = array('login' => $aUserLogin);

    if (!$this->page->settings->db->executeRecord(
      $this->page->settings->db->sqlSelectBuild('users',
        array('id, name, password, random_part', 'is_admin'),
        $lWhereParams),
      $lRecord,
      $lWhereParams))
      return;

    $lPasswordHash = cCryptHelper::stringCrypt($aUserPassword,
      STATIC_RANDOM_PART, $lRecord['random_part']);

    if ($lPasswordHash == $lRecord['password'])
    {
      $this->userId     = $lRecord['id'];
      $this->userLogin  = $aUserLogin;
      $this->userName   = $lRecord['name'];
      $this->logonLevel = $lRecord['is_admin'] ? 'admin' : 'user';
      $this->isLogged   = true;
    }
  }
}
?>