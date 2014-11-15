<?php
require_once('../../../blocks/components/common/tools.php');

$lXml1 = new cXmlDocument();
$lXml2 = new cXmlDocument();

$lXml1->loadFromFile('1.xml');
$lXml2->loadFromFile('2.xml');

$lXml1->update($lXml2);

$lXml1->saveToFile('result.xml');

print(((fileToString('result.xml') == fileToString('etalon.xml'))
  ? 'Done' : 'Error').'<br><br>');

$lColCount = 60;
$lRowCount = 25;
?>
<table>
  <tr>
    <td>1.xml</td>
    <td>2.xml</td>
  </tr>
  <tr>
    <td><textarea rows="<?print($lRowCount);?>" cols="<?print($lColCount);?>"><?print(fileToString('1.xml'));?></textarea></td>
    <td><textarea rows="<?print($lRowCount);?>" cols="<?print($lColCount);?>"><?print(fileToString('2.xml'));?></textarea></td>
  </tr>
  <tr>
    <td>Result</td>
    <td>Etalon</td>
  </tr>
  <tr>
    <td><textarea rows="<?print($lRowCount);?>" cols="<?print($lColCount);?>"><?print(fileToString('result.xml'));?></textarea></td>
    <td><textarea rows="<?print($lRowCount);?>" cols="<?print($lColCount);?>"><?print(fileToString('etalon.xml'));?></textarea></td>
  </tr>
</table>