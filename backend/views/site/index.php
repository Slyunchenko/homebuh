<?php

/* @var $this yii\web\View */

use yii\helpers\BaseHtml;

$this->title = 'My Yii Application!!!!!';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!!!!!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="/journal/index">Записати показання</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-center">ПАТ "Запоріжжяоблєнерго"</h5>

                <p class="text-center"><?= BaseHtml::img("/img/zoe.png", ['style' => 'height: 64px']) ?></p>

                <p class="text-center"><a class="btn btn-danger" href="https://www.zoe.com.ua/" target="_blank">Сайт ПАТ "ЗОЕ" &raquo;</a>
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-center">АТ "Запоріжгаз"</h5>

                <p class="text-center"><?= BaseHtml::img("/img/zgaz.jpg", ['style' => 'height: 64px']) ?></p>

                <p class="text-center"><a class="btn btn-danger" href="https://104.ua/" target="_blank">Сайт "Запоріжгаз" &raquo;</a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-center">КП "Водоканал"</h5>

                <p class="text-center"><?= BaseHtml::img("/img/voda.png", ['style' => 'height: 64px']) ?></p>

                <p class="text-center"><a class="btn btn-danger" href="http://www.vodokanal.zp.ua/" target="_blank">Сайт КП "Водоканал"
                        &raquo;</a></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-center">Концерн "Міські Теплові Мережі"</h5>

                <p class="text-center"><?= BaseHtml::img("/img/hotvoda.png", ['style' => 'height: 64px']) ?></p>

                <p class="text-center"><a class="btn btn-danger" href="http://teploseti.zp.ua/" target="_blank">Сайт Концерн "МТМ" </a></p>
            </div>
        </div>

    </div>
</div>
