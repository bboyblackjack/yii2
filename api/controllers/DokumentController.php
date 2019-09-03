<?php

namespace api\controllers;

use api\models\Dokument;
use api\models\Lichnost;
use yii\rest\ActiveController;

class DokumentController extends ActiveController
{
    public $modelClass = 'api\models\dokument';

    /*Получает все документы личности*/
    public function actionGetLichnostDocuments($id)
    {
        if($l = Lichnost::findOne($id))
        {
            return $this->asJson($l->dokuments);
        }
        else
        {
            return $this->asJson('Lichnost undefined');
        }
    }

    /*Создает документ личности*/
    public function actionAddLichnostDocument($id)
    {
        if($l = Lichnost::findOne($id))
        {
            $mdl = new Dokument();
            $mdl->attributes = \Yii::$app->request->get();
            $mdl->lichnost_id = $l->id;

            if($mdl->validate() && $mdl->save())
            {
                return $this->asJson('Dokument successfully created');
            }
            else
            {
                return $this->asJson($mdl->errors);
            }
        }
        else
        {
            return $this->asJson('Lichnost undefined');
        }
    }

    /*Получает документ личности по id*/
    public function actionGetLichnostDocumentById($lid, $did)
    {
        if(($l = Lichnost::findOne($lid)) && ($d = Dokument::findOne($did)) && $d->lichnost->id == $l->id)
        {
            return $this->asJson($d);
        }
        else
        {
            return $this->asJson("Request returned an empty result");
        }
    }

    /*Удаляет доукмент личности*/
    public function actionDeleteLichnostDocument($lid, $did)
    {
        if(($l = Lichnost::findOne($lid)) && ($d = Dokument::findOne($did)) && $d->lichnost->id == $l->id)
        {
            $d->delete();
            return $this->asJson("Dokument $did successfull deleted");
        }
        else
        {
            return $this->asJson("Request returned an empty result");
        }
    }

    /*Обновляет документ личности*/
    public function actionUpdateLichnostDocument($lid, $did)
    {
        if(($l = Lichnost::findOne($lid)) && ($d = Dokument::findOne($did)) && $d->lichnost->id == $l->id)
        {
            $d->attributes = \Yii::$app->request->get();

            if($d->validate())
            {
                $d->save();
                return $this->asJson("Dokument $did successfully updated");
            }
            else
            {
                return $this->asJson($d->errors);
            }
        }
        else
        {
            return $this->asJson("Request returned an empty result");
        }
    }
}