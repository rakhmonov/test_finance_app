<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 14.03.2018
 * Time: 13:20
 */
include_once 'db_con.php';
$db = DataBase::getDB();

$i = 0;
$num = 1;

//parse_str($_REQUEST['SendForm'], $res_par);
$date_1 = str_replace('/', '-', $_REQUEST['date1']);
$date_2 = str_replace('/', '-', $_REQUEST['date2']);

$date1 = date('Y-m-d H:i:s', strtotime($date_1));
$date2 = date('Y-m-d H:i:s', strtotime($date_2));

$table = "SELECT * FROM cash_of WHERE DATE(date_of) BETWEEN '" . $date1 . "' AND '" . $date2 . "'";

$table_data = $db->select($table);

$countItems = count($table_data);

?>


{
"data":[
<? foreach ($table_data as $row) {
    $data = date('H:i:s d/m/Y',strtotime($row['date_of']));
    if($row['cash_type']==='0'){
        $row['cash_type'] = 'Заработная плата';
    }
    elseif($row['cash_type'] === '1'){
        $row['cash_type'] = 'Иные доходы';
    }
    if (++$i === $countItems) {?>
        [
        "<?= $num; ?>",
        "<?=$row['cash'];?>",
        "<?=$row['cash_type'];?>",
        "<?=$data?>",
        "<?=$row['comments'];?>"
        ]
    <?} else { ?>
        [
        "<?= $num; ?>",
        "<?=$row['cash'];?>",
        "<?=$row['cash_type'];?>",
        "<?=$data;?>",
        "<?=$row['comments'];?>"
        ],
    <?}$num++;}?>
]
}

