<?php

namespace api\controllers;

use api\models\Lichnost;
use yii\rest\ActiveController;
use yii\web\Response;

class LichnostController extends ActiveController
{
    public $modelClass = 'api\models\Lichnost';

    public function actionGetLichnost()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return Lichnost::find()->all();
    }

    public function actionAddLichnost()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $mdl = new Lichnost();
        $mdl->attributes = \Yii::$app->request->get();

        if($mdl->validate())
        {
            return 'okay';
        }
        else
        {
            return $mdl->errors;
        }
    }
}