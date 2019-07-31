<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Country extends ActiveRecord
{
    public static function tableName(){
        return 'countries';
    }
}