<?php

namespace api\controllers;

use api\models\Lichnost;
use yii\rest\ActiveController;
use yii\web\Response;

class LichnostController extends ActiveController
{
    public $modelClass = 'api\models\Lichnost';

    /*Получает список всех личностей*/
    public function actionGetLichnost()
    {
        return $this->asJson(Lichnost::find()->all());
    }

    /*Добавляет личность*/
    public function actionAddLichnost()
    {
        $mdl = new Lichnost();
        $mdl->attributes = \Yii::$app->request->get();

        if($mdl->validate() && $mdl->save())
        {
            return $this->asJson('Lichnost successfully created');
        }
        else
        {
            return $this->asJson($mdl->errors);
        }
    }

    /*Получает личность по id*/
    public function actionGetLichnostById($id)
    {
        return $this->asJson(Lichnost::findOne($id));
    }

    /*Обновляет личность*/
    public function actionUpdateLichnost($id)
    {
        $mdl = Lichnost::findOne($id);

        if($mdl)
        {
            $mdl->attributes = \Yii::$app->request->get();

            if($mdl->validate())
            {
                $mdl->save();
                return $this->asJson('Lichnost successfully updated');
            }
            else
            {
                return $this->asJson($mdl->errors);
            }
        }
        else
        {
            return $this->asJson("Lichnost undefined");
        }
    }

    /*Удаляет личность*/
    public function actionDeleteLichnost($id)
    {
        if($l = Lichnost::findOne($id))
        {
            foreach($l->dokuments as $d)
            {
                $d->delete();
            }
            $l->delete();
            return $this->asJson("Lichnost $id successfull deleted");
        }
        else
        {
            return $this->asJson("Lichnost undefined");
        }
    }
}