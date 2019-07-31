<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Direction extends ActiveRecord
{
    public static function tableName(){
        return 'directions';
    }

}