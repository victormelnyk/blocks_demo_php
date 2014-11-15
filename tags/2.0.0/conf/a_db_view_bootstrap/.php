<?php
$lRootDir = '../../../';

require_once($lRootDir.'blocks/comp/common/tools.php');
require_once($lRootDir.'blocks/comp/blocks/blocks.php');

cPage::settingsGet()->rootDir = $lRootDir;

cPage::moduleAdd('blocks/comp/common/db.php');
cPage::moduleAdd('blocks_demo/conf_app/.php');
cPage::moduleAdd('blocks/comp/helpers/bootstrap_table/.php');

cPage::settingsGet()->db = new cDbMySql('localhost', 'root', '', 'blocks');
?>
