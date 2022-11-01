<?php

namespace app\models;

use yii\db\ActiveRecord;

class Salary extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%salaries}}';
    }
}