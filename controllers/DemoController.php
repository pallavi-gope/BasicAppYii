<?php

namespace app\controllers;

use Yii;

class DemoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionDemo_home()
    {
        $model = new \app\models\Student();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('demo_home', [
            'model' => $model,
        ]);
    }
}
