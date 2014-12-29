<?
require_once('../../../../blocks/comp/common/tools.php');
require_once('../../../../blocks/comp/helpers/performance_counter/.php');

$lIterationCount = isset($_GET['IterationCount'])
  ? (integer)$_GET['IterationCount'] : 10000;
print('IterationCount = '.$lIterationCount.'<br>');

$lArray = null;
$lList = null;

cPCHelper::start('Create array');
for ($i = 0; $i < $lIterationCount; $i++)
  $lArray = array();
cPCHelper::stop('Create array');

cPCHelper::start('Create list');
for ($i = 0; $i < $lIterationCount; $i++)
  $lList = new NamedIndexedList();
cPCHelper::stop('Create list');

cPCHelper::start('Add index array');
for ($i = 0; $i < $lIterationCount; $i++)
  $lArray[] = 'key_'.$i;
cPCHelper::stop('Add index array');

cPCHelper::start('Get index array');
for ($i = 0; $i < $lIterationCount; $i++)
  $lValue = $lArray[$i];
cPCHelper::stop('Get index array');

$lArray = array();
cPCHelper::start('Add name array');
for ($i = 0; $i < $lIterationCount; $i++)
  $lArray['key_'.$i] = 'value';
cPCHelper::stop('Add name array');

cPCHelper::start('Get name array');
for ($i = 0; $i < $lIterationCount; $i++)
  $lValue = $lArray['key_'.$i];
cPCHelper::stop('Get name array');

cPCHelper::start('Add list');
for ($i = 0; $i < $lIterationCount; $i++)
  $lList->add('key_'.$i, 'value');
cPCHelper::stop('Add list');

cPCHelper::start('Get index list');
for ($i = 0; $i < $lIterationCount; $i++)
  $lValue = $lList->getByI($i);
cPCHelper::stop('Get index list');

cPCHelper::start('Get name list');
for ($i = 0; $i < $lIterationCount; $i++)
  $lValue = $lList->getByN('key_'.$i);
cPCHelper::stop('Get name list');

cPCHelper::start('Array count');
for ($i = 0; $i < $lIterationCount; $i++)
  $lValue = count($lArray);
cPCHelper::stop('Array count');

cPCHelper::start('for array count');
for ($i = 0; $i < count($lArray); $i++)
  $lValue = $i;
cPCHelper::stop('for array count');

cPCHelper::start('for array len');
for ($i = 0, $l = count($lArray); $i < $l; $i++)
  $lValue = $i;
cPCHelper::stop('for array len');

cPCHelper::saveToHtml();
?>