<?
require_once('../../../../blocks/comp/common/tools.php');
require_once('../../../../blocks/ext/php_json_format_master/jsonformat.class.php');

function p2($value) {
  p('<pre>' . $value . '</pre>');
}

function vd($value) {
  p('<pre>');
  var_dump($value);
  p('</pre>');
}
/*
$items = array(
  'fInteger' => 5,
  'fFloat' => 7.2,
  'fString' => 'Simple text',
  'fText' => 'Multy line text 1
Multy line text 2
Multy line text 3
Multy line text 4',
  'farray' => array('value1', 'value2', 'value3'),
  'fobject' => array(
    'fInteger2' => 5,
    'fFloat2' => 7.2,
    'fString2' => 'Simple text',
    'fobject2' => array(
      'fInteger3' => 5,
      'fFloat3' => 7.2
    )
  )
);
*/
$itemsJson1 = fileToString('1.json');
$items1 = json_decode($itemsJson1, true);
$list1 = new HierarchyList($items1);

$itemsJson2 = fileToString('2.json');
$items2 = json_decode($itemsJson2, true);
$list2 = new HierarchyList($items2);

/*!
$list1_level1 = $list1->getCurrList();
vd($list1_level1->getNextByN('fInteger'));
vd($list1_level1->getNextByN('fFloat'));
vd($list1_level1->getNextByN('fString'));
vd($list1_level1->getNextByN('fText'));

$list1_farray = $list1->beginLevel('farray');
vd($list1_farray->getNextByN(0));
vd($list1_farray->getNextByN(1));
vd($list1_farray->getNextByN(2));
$list1->endLevel();

$list1_level2 = $list1->beginLevel('fobject');
vd($list1_level2->getNextByN('fInteger2'));
vd($list1_level2->getNextByN('fFloat2'));
vd($list1_level2->getNextByN('fString2'));

$list1_level3 = $list1->beginLevel('fobject2');
vd($list1_level3->getNextByN('fInteger3'));
vd($list1_level3->getNextByN('fFloat3'));
$list1->endLevel();

$list1->endLevel();

$list1->finalize();
*/

$list1->getCurrList()->marge($list2->getCurrList()->getItems());
$items1 = $list1->getCurrList()->getItems();

$itemsJson = json_encode($items1);
$jsonFormater = new JSONFormat();
$itemsJson = $jsonFormater->format($itemsJson, true);
stringToFile($itemsJson, 'result.json');

//!vd($items1);

eAssert(trim(fileToString('result.json')) == trim(fileToString('etalon.json')));
p('done');
?>