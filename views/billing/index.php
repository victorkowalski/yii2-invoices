<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Billing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    return $data->user->name; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    return $data->user->email; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            
            'invoice_name',            
            'price'
        ],
    ]
);?>


