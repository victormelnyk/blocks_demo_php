<?php
require_once('../../../blocks/components/common/tools.php');
require_once('../../../blocks/components/helpers/performance_counter/.php');

$lIterationCount = isset($_GET['IterationCount'])
  ? (integer)$_GET['IterationCount'] : 10000;
print('IterationCount = '.$lIterationCount.'<br>');

$lStr1 = fileToString('1.htm');
$lStr2 = fileToString('2.htm');

$lNames = array('value');
$lValues = array('1234567890');
$lNamesValues = array('value' => '1234567890');

cPCHelper::start('TagsReplace');
for ($i = 0; $i < $lIterationCount; $i++)
  tagsReplace($lStr1, $lNames, $lValues);
cPCHelper::stop('TagsReplace');

cPCHelper::start('TemplateProcess');
for ($i = 0; $i < $lIterationCount; $i++)
  templateProcess($lStr2, $lNamesValues);
cPCHelper::stop('TemplateProcess');

cPCHelper::saveToHtml();
?>