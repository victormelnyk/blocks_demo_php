<?php
$lRootDir = '../../../';

require_once($lRootDir.'blocks/comp/common/tools.php');
require_once($lRootDir.'blocks/comp/blocks/blocks.php');

cPage::settingsGet()->rootDir = $lRootDir;

cPage::moduleAdd('blocks/comp/common/db.php');
cPage::moduleAdd('blocks_demo/comp/logon_context/.php');
cPage::moduleAdd('blocks_demo/conf_app/.php');

cPage::settingsGet()->db = new cDbMySql('localhost', 'root', '', 'blocks');
cPage::settingsGet()->context = new cBlocksDemo_LogonContext();

define('STATIC_RANDOM_PART', 'blocks');
?>
