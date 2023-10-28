<?php
namespace app\components;
use Yii;
use yii\base\Behavior;

class MyBehavior extends Behavior{
    public $prop1;
    public $prop2;
    public function events()
    {
        echo 'Yes behavior : '.$this->prop1.'->'.$this->prop2.'<br/>';
        return [];
    }
}