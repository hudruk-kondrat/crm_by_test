<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\WorkLogSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="work-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'lead_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'lead_status_id') ?>

    <?php // echo $form->field($model, 'stages_transactions_id') ?>

    <?php // echo $form->field($model, 'products') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
