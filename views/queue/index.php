<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Queue';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-queue">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Test Queue:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'queue-form',
    ]); ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Start Job', ['class' => 'btn btn-primary', 'name' => 'queue-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        Example of Queue job. File will be downloaded<br>
    </div>
</div>
