<?
$lRootDir = '../../';

require_once($lRootDir.'blocks/comp/common/tools.php');
require_once($lRootDir.'blocks/comp/blocks/blocks.php');

Page::getSettings()->rootDir = $lRootDir;

Page::addModule('blocks_demo/conf_app/.php');
?>