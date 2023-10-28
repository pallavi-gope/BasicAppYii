<?php

/** @var yii\web\View $this */

use app\widgets\Form;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
// $listArray = [
//     'itemTemplate' => '<li><b>{links}</b></li>',   //Apply style for all items
//     [
//         'label' => 'Info',
//         'url' => '/first/info'
//     ],
//     [
//         'label' => 'About',
//         'url' => '/site/about'
//     ]
// ];
?>
<div class="site-about">
    <?= Breadcrumbs::widget([
        'itemTemplate' => '<li class="breadcrumb-item"><b>{link}</b></li>',  //Apply style for all items
        'links' => [
            [
                'label' => 'Info',
                'url' => '/first/info',
                'template' => '<li class="breadcrumb-item"><i>{link}</i></li>'
            ],
            [
                'label' => 'About',
                'url' => '/site/about'
            ]
        ]
    ]); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <br />
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body bg-light">
                    <!-- USE CUSTOM WIDGET -->
                    <?=
                    Form::widget(['pageType' => 'Login Page', 'records' => [1, 2, 3, 4, 5]]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br />
    <?php
    if (Yii::$app->session->has('userName')) {
        echo 'SESSION = '. Yii::$app->session->get('userName');
    }
    ?>
    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>