<?php

use app\models\Lead;
use app\models\LeadStatus;
use app\models\StagesTransactions;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
/** @var yii\web\View $this */
/** @var app\models\WorkLog $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="work-log-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group field-worklog-lead_id required">
        <label class="control-label" for="worklog-lead_id">Лид: </label>
        <b>
            <?= $model->lead->name  ?>
        </b>
    </div>
    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id','login')) ?>

    <?= $form->field($model, 'lead_status_id')->dropDownList(ArrayHelper::map(LeadStatus::find()->all(), 'id','name')) ?>

    <?= $form->field($model, 'stages_transactions_id')->dropDownList(ArrayHelper::map(StagesTransactions::find()->all(), 'id','name')) ?>

    <?=  $form->field($model, 'products')->widget(MultipleInput::className(), [
        'min' => 2,
        'columns' => [
                [
                    'name'  => 'products',
                    'type'  => 'dropDownList',
                    'title' => 'Продукт',
                    'items' => ArrayHelper::map( \app\models\Products::find()->asArray()->all (),'id','name'),
                ],
        ],
        'addButtonOptions' => [
            'class' => 'btn btn-success',
        ],
        'removeButtonOptions' => [],
        'addButtonPosition' => \unclead\multipleinput\MultipleInput::POS_FOOTER
    ])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
