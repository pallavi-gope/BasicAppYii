<?php
use app\assets\TestAsset;

TestAsset::register($this);

$this->title = "First Controller App";
$this->registerMetaTag([
    'name' => 'title', 'content' => 'First Controller App' ?? ''
]);


$this->params['breadcrumb'][] = $this->title;
// CALLS THE PARAMETERS PASSED THROUGH THE CONTROLLER
echo "<pre>";
echo $pageTitle. "<br/>"; 
echo $demoList[0] . "<br/>";
echo $demoList[1] . "<br/>";
echo $demoList[2] . "<br/>";
echo $demoList[3] . "<br/>";
echo $demoList[4] . "<br/>";

?>
<div class="site-index">
    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

</div>
<!-- TO USE JAVASCRIPT -->
<?php //$this->registerJs("alert('Hello World');"); ?>

