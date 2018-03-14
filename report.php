<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 13.03.2018
 * Time: 16:41
 */
require_once 'theme/header.php'; ?>
    <style>
        .f-button{
            margin-top: 24px;
        }
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Отчеты по расходам</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form action="" id="report_period" method="post">
                            <input type="hidden" name="SendForm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_of">Дата с</label>
                                <div class="input-group date" id="date1">
                                    <input type="text" name="date1" class="form-control" placeholder="Укажите дату">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"><div class="form-group">
                                <label for="date_of">по</label>
                                <div class="input-group date" id="date2">
                                    <input type="text" name="date2" class="form-control" placeholder="Укажите дату">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div></div>
                        <div class="col-md-4">
                            <div class="f-button">
                            <button type="submit" class="btn btn-success">Фильтр</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Расходы</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="expenses_list" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Сумма</th>
                        <th>Расход на</th>
                        <th>Дата</th>
                        <th>Комментарии</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<? require_once 'theme/footer.php';