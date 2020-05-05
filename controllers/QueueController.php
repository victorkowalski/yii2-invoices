<?php

namespace app\controllers;

//use app\models\Billing;
use yii\data\ActiveDataProvider;

class QueueController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
