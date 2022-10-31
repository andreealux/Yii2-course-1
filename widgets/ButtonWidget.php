<?php

namespace app\widgets;

use yii\base\Widget;

class ButtonWidget extends Widget
{
    public $text;

    public function init(){
        parent::init();
        $this->text = ucfirst($this->text);
    }

    public function run(){
        parent::run();
        return '<button>'.$this->text.'</button>';
    }
}