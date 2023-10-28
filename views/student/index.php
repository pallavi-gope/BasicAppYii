<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <!-- GRID VIEW -->
    <?php
    // GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     // 'showHeader' => false,
    //     'showFooter' => true,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],
    //         //customize header name
    //         [
    //             'attribute' => 'id',
    //             'header' => 'Employee ID',
    //             'visible' => false
    //         ],
    //         [
    //             'attribute' => 'name',
    //             'header' => 'Employee Name',
    //             'contentOptions' => ['style' => 'background:#f1f1f1'],
    //             // 'filter' => ['male' => 'M', 'female' => 'F'] // filter dropdown
    //             'footer' => 'Total'
    //         ],
    //         'email:email',
    //         'phone_no',
    //         'profile_pic',
    //         //'password',
    //         //'created_at',
    //         [
    //             'header' => 'Action',
    //             'class' => ActionColumn::className(),
    //             'urlCreator' => function ($action, Student $model, $key, $index, $column) {
    //                 return Url::toRoute([$action, 'id' => $model->id]);
    //             },
    //             'headerOptions' => ['width' => 190],
    //             'template' => '{update} {view} {delete}'
    //         ],
    //     ],
    //     'layout' => "{items}\n{summary}\n{pager}",
    //     'showOnEmpty' => false, // Table won't show when it's empty,
    //     'emptyCell' => 'N/A' //N/A on empty cells
    // ]);
    ?>

    <!-- LIST VIEW -->
    <?php
    /* echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $item, $key, $widget) {
        ?>
            <div>
                <p><?php echo $model->name; ?></p>
                <p><?php echo $model->email; ?></p>
            </div>
        <?php
            }
    ]);*/
    ?>

    <!-- LIST VIEW WITH VIEW FILE -->
    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'list_item_view', // view file name
        'viewParams' => [
            'testData' => 'Test Data'
        ],
        // 'options' => ['class'=>'card'],
        'itemOptions' =>  ['class' => 'card mb-3'],
    ]);
    ?>

</div>