<?php
/**
 * Created by PhpStorm.
 * User: Rakhmonov
 * Date: 06.03.2018
 * Time: 12:02
 */

require_once 'theme/header.php';?>
        <!-- top tiles -->
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" class="show_modal" id="cash_add"><i class="fa fa-plus"></i></a></div>
                    <div class="count"><?=$cash;?></div>
                    <h3>Заработная плата</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-plus"></i></div>
                    <div class="count"><?=$other?></div>
                    <h3>Иные доходы</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-plus"></i></div>
                    <div class="count"><?=number_format($cash_of_month[0]['sum(e_sum)'])?></div>
                    <h3>Расходы за этот месяц</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-plus"></i></div>
                    <div class="count"><?=number_format($all_exp[0]['sum(e_sum)'])?></div>
                    <h3>Расходы за весь период</h3>
                </div>
            </div>
        </div>
        <!-- /top tiles -->
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Общая статистика</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="mainb" style="height: 350px;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Расходы по категориям</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="echart_pie" style="height: 350px;">
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
                        <table id="datatable" class="table table-striped table-bordered">
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