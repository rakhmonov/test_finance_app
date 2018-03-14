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

if (isset($_REQUEST['SendForm'])){
    parse_str($_REQUEST['SendForm'],$res_par);
    $date_1 = str_replace('/','-',$res_par['date1']);
    $date_2 = str_replace('/','-',$res_par['date2']);

    $date1 = date('Y-m-d H:i:s', strtotime($date_1));
    $date2 = date('Y-m-d H:i:s', strtotime($date_2));

    $table = "SELECT * FROM expenses t1 LEFT JOIN r_expenses t2 ON t1.e_type=t2.id WHERE DATE(t1.e_day) BETWEEN '".$date1."' AND '".$date2."'";
}else {
    $table = "SELECT * FROM expenses t1 LEFT JOIN r_expenses t2 ON t1.e_type=t2.id";
}
$table_data = $db->select($table);

$countItems = count($table_data);

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
