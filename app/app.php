<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 10.03.2018
 * Time: 14:36
 */
include_once 'db_con.php';

$db = DataBase::getDB(); // Создаём объект базы данных
//$query = "SELECT * FROM `users` WHERE `id` > {?}";
/*$table = $db->select($query, array(10, 1)); // Запрос явно должен вывести таблицу, поэтому вызываем метод select()
$query = "SELECT `login` FROM `users` WHERE `email` = {?}";
$login = $db->selectCell($query, array("test@mail.ru"));// Запрос должен вывести конкретную ячейку, поэтому вызываем метод selectCell()*/

$user_name = $db->selectCell('SELECT full_name FROM USER WHERE id=1');

$cash_last = $db->select('SELECT * FROM cash_of WHERE cash_type=0 ORDER BY date_of desc');

if (empty($cash_last)){
    $cash = 'Вы еще не добавили ЗП';
}else{
    $cash = number_format($cash_last[0]['cash']);
}

$other_cash = $db->select('SELECT * FROM cash_of WHERE cash_type=1 ORDER BY date_of desc');
if(empty($other_cash)){
    $other='Вы еще не добавили доходов';
}else{
    $other = number_format($other_cash[0]['cash']);
}

$query = "SELECT * FROM r_expenses ORDER by id";
$r_expenses = $db->select($query);

$cash_of_month = $db->select('select sum(e_sum) from expenses WHERE e_day > LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 1 MONTH AND e_day < DATE_ADD(LAST_DAY(CURDATE()), INTERVAL 1 DAY)');
$all_exp = $db->select('select sum(e_sum) from expenses');

if(isset($_REQUEST['SendForm'])){
 $cash_add_form = $_REQUEST['SendForm'];
 parse_str($cash_add_form,$res_par);
 if(isset($res_par['cash_add_form'])){
    $cash = $res_par['cash'];
    $cash_type = $res_par['cash_type'];
    $date = str_replace('/','-',$res_par['date_of']);
    $date_of = date('Y-m-d H:i:s', strtotime($date));
    $comment = $res_par['comment'];

    $query = "INSERT INTO cash_of (cash,cash_type,date_of, comment) VALUES ('".$cash."','".$cash_type."','".$date_of ."', '".$comment."')";
    $cashe_add = $db->query($query);

    if ($cashe_add){
        echo 'OK';
    }else{
        echo 'Error';
    }
 }
 else
     if (isset($res_par['expense'])) {
         $date = str_replace('/','-',$res_par['date_of']);
     if(isset($res_par['new_exp']) && !empty($res_par['new_exp'])){
         $exp_name = $res_par['new_exp'];
         $new_exp = "INSERT INTO r_expenses (name) VALUES ('".$exp_name."')";
         $exp = $db->query($new_exp);
         if ($exp){
             $res_par['expenses_type'] = $exp;
         }else{
             echo 'Error';
         }
     }
         $sum = $res_par['sum'];
         $type = $res_par['expenses_type'];
         $date_of = date('Y-m-d H:i:s', strtotime($date));
         $comment = $res_par['comment'];
         $query1 = "INSERT INTO expenses (e_type, e_sum, e_day,comments) VALUES ('".$type."','".$sum."','".$date_of."','".$comment."')";
         $expense = $db->query($query1);
         if ($expense){
             echo 'OK';
         }else{
             echo 'Error';
         }
     }
}
