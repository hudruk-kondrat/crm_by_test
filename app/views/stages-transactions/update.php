<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StagesTransactions $model */

$this->title = 'Изменение этапа сделки: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Этапы сделки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>'Этап сделки: '.$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="stages-transactions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
