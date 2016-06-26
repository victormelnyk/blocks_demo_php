<?
require_once('../../../blocks/components/common/tools.php');

print(processTemplate(fileToString('.htm'), array(
  'string' => 'text',
  'integer' => 5,
  'float' => 10 / 3,
  'bool' => true,
  'array' => array(3, 6, 9),
  'array2' => array('f1' => 5, 'f2' => 10, 'f3' => 15)
)));
?>