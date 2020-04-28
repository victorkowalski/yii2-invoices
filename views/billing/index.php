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
    ]
);?>


