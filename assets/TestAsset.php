<?php
namespace app\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/test.css',
    ];
    public $js = [
        'js/test.js',
    ];
    public $depends = [
        
    ];
}
