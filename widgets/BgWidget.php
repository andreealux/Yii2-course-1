<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class BgWidget extends Widget
{
    public $bgColor = 'white';

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        parent::run();
        $output = ob_get_clean();

        return $this->render('test', ['message' => 'Hello from widget view file']);
//        return Html::tag('div', $output, ['style' => 'background-color: ' . $this->bgColor]);
//        return '<div>'.$output.'</div>';
    }


}