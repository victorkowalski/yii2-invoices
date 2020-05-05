<?php

namespace app\controllers;

use app\models\Billing;
use yii\data\ActiveDataProvider;

class BillingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Billing::find()->alias('b')
            ->leftJoin('user u', 'u.id = b.user_id')
            ->orderBy(['b.price' => SORT_DESC]);

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $provider,
        ]);
    }

}
