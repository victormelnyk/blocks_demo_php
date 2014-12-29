<?
$lRootDir = '../../../';

require_once($lRootDir.'blocks/comp/common/tools.php');
require_once($lRootDir.'blocks/comp/blocks/blocks.php');

Page::getSettings()->rootDir = $lRootDir;

Page::addModule('blocks/comp/common/db.php');
Page::addModule('blocks_demo/comp/logon_context/.php');
Page::addModule('blocks_demo/conf_app/.php');

Page::getSettings()->db = new cDbMySql('localhost', 'root', '', 'blocks');
Page::getSettings()->context = new BlocksDemo_LogonContext();

define('STATIC_RANDOM_PART', 'blocks');
?>
