<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 11.03.2018
 * Time: 14:02
 */

include_once 'app.php';

if (isset($_REQUEST['showModal']) && $_REQUEST['showModal'] == 'cash_add') {?>
    <input type="hidden" name="cash_add_form">
        <label for="sum">Сумма</label>
        <input type="number" name="cash" class="form-control" placeholder="Сколько получили? =)" required>
        <label for="cash_type">Вид средств</label>
        <select name="cash_type" id="cash_type" class="select2_group form-control" required>
            <option value="">Выберите...</option>
            <option value="0">Зарплата</option>
            <option value="1">Иные доходы</option>
        </select>
        <div class="form-group">
            <label for="date_of">Дата поступления</label>
            <div class="input-group date" id="myDatepicker">
                <input type="text" name="date_of" class="form-control" placeholder="Укажите дату">
                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <fieldset>
            <label for="comment">Комметария</label>
            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
        </fieldset>
<? }else
    if (isset($_REQUEST['showModal']) && $_REQUEST['showModal'] == 'expense'){?>

        <input type="hidden" name="expense">
        <label for="sum">Расход</label>
        <input type="number" name="sum" class="form-control" placeholder="Сколько потратили?" required>
        <label for="cash_type">Вид средств</label>
        <select name="expenses_type" id="expenses_type" class="select2_group form-control" required>
            <option value="">Выберите...</option>
            <?foreach($r_expenses as $exp):?>
            <option value="<?= $exp['id'] ?>"><?= $exp['name'] ?></option>
            <?endforeach;?>
        </select>
        <div class="form-group" id="new_exp" style="display:none;">
        <label for="expenses_type">Введите</label>
        <input type="text" class="form-control" name="new_exp">
        </div>
        <div class="form-group">
            <label for="date_of">Дата</label>
            <div class="input-group date" id="myDatepicker">
                <input type="text" name="date_of" class="form-control" placeholder="Укажите дату">
                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <fieldset>
            <label for="comment">Комметария</label>
            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
        </fieldset>
        <script>
            $('#expenses_type').on('change', function () {
                if ($(this).val() == 1) {
                    $('#new_exp').show();
                }
                else{
                    $('#new_exp').hide();
                }
            });
        </script>
<?}; ?>
<script>$('#myDatepicker').datetimepicker({
        allowInputToggle: true,
        defaultDate: new Date(),
        format: 'DD/MM/YYYY HH:mm:ss',
        useCurrent: true,
        minDate: 0
    });
</script>