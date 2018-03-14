<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 09.03.2018
 * Time: 16:27
 */

include_once 'db_con.php';
$db = DataBase::getDB();
$i = 0;
$num = 1;
$table = 'SELECT * FROM expenses t1 LEFT JOIN r_expenses t2 ON t1.e_type=t2.id';
$table_data = $db->select($table);

$countItems = count($table_data);

echo $data;
?>

{
"data":[
<? foreach ($table_data as $row) {
    $data = date('H:i:s d/m/Y',strtotime($row['e_day']));
    if (++$i === $countItems) {?>
[
"<?= $num; ?>",
"<?=$row['e_sum'];?>",
"<?=$row['name'];?>",
"<?=$data?>",
"<?=$row['comments'];?>"
]
<?} else { ?>
[
"<?= $num; ?>",
"<?=$row['e_sum'];?>",
"<?=$row['name'];?>",
"<?=$data;?>",
"<?=$row['comments'];?>"
],
<?}$num++;}?>
]
}
