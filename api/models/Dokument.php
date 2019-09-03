<?php

namespace api\models;

use yii\db\ActiveRecord;

class Dokument extends ActiveRecord
{
    public function rules()
    {
        return [
            [['number', 'issue_date', 'type', 'lichnost_id'], 'required'],
            ['lichnost_id', 'integer'],
            [['lichnost_id'], 'exist', 'targetClass' => Lichnost::className(), 'targetAttribute' => 'id'],
            ['series', 'string', 'max' => 6],
            ['number', 'string', 'max' => 10],
            ['issue_date', 'date', 'format' => 'php:Y-m-d'],
            ['type', 'string', 'max' => 255],
            [['series', 'number'], 'unique', 'targetAttribute' => ['series', 'number']]
        ];
    }

    public function getLichnost()
    {
        return $this->hasOne(Lichnost::className(), ['id' => 'lichnost_id']);
    }
}