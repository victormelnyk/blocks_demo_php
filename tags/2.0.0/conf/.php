<?php
$lRootDir = '../../';

require_once($lRootDir.'blocks/comp/common/tools.php');
require_once($lRootDir.'blocks/comp/blocks/blocks.php');

cPage::settingsGet()->rootDir = $lRootDir;

cPage::moduleAdd('blocks_demo/conf_app/.php');
?>