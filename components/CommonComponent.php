<?php
namespace app\components;

use Yii;
use yii\base\Component;

class CommonComponent extends Component{
    public function getToken(){
        return 'AFHDJA8394KLFJASD';
    }
    public function getData(){
        $data = Yii::$app->db->createCommand("SELECT * FROM `student`")->queryAll();
        echo '<pre>'; print_r($data);
    }
}
