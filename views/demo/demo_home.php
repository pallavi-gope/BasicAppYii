<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var ActiveForm $form */
?>
<div class="demo-demo_home">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'phone_no') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'profile_pic') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- demo-demo_home -->
