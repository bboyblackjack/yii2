<?php

namespace api\models;

use yii\db\ActiveRecord;

class Lichnost extends ActiveRecord
{
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'birthday', 'sex'], 'required'],
            [['firstname', 'lastname', 'patronymic'], 'string', 'max' => 255],
            ['sex', 'boolean'],
            ['birthday', 'date', 'format' => 'php:Y-m-d']
        ];
    }

    public function getDokuments()
    {
        return $this->hasMany(Dokument::className(), ['lichnost_id' => 'id']);
    }
}