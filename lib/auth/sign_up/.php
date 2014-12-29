<?
Page::addModule('blocks/lib/auth/sign_up/.php');

class BlocksDemo_Auth_SignUp extends Blocks_Auth_SignUp
{
  protected function loginExist($aLogin)
  {
    $lParams = array('login' => $aLogin);

    return $this->db->executeRecord($this->db->sqlSelectBuild('users',
      array('login'), $lParams), $lRecord, $lParams);
  }

  protected function userSave(array $aParams)
  {
    $lRandomPart = cCryptHelper::dynamicRandomPartGenerate();
    $lPasswordHash = cCryptHelper::stringCrypt($aParams['password'],
      STATIC_RANDOM_PART, $lRandomPart);

    $lParams = array(
      'login'       => $aParams['login'],
      'name'        => $aParams['name'],
      'password'    => $lPasswordHash,
      'random_part' => $lRandomPart
    );

    $this->db->execute($this->db->sqlInsertBuild('users', $lParams),
      $lParams);
  }
}
?>