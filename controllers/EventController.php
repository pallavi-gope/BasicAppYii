<?php

namespace app\controllers;

class EventController extends \yii\web\Controller
{
    const EVENT_DEMO = 'Event Demo';
    public function actionIndex()
    {
        //CALL EVENT
        $this->on(self::EVENT_DEMO, 'upperData', 'Hello World');
        $this->trigger(self::EVENT_DEMO);
        $this->off(self::EVENT_DEMO);
        // return $this->render('index');
    }

}
