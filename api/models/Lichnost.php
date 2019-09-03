<?php

namespace api\models;

use yii\db\ActiveRecord;

class Lichnost extends ActiveRecord
{
    public function rules()
    {
        return [
            ['firstname', 'required']
        ];
    }
}