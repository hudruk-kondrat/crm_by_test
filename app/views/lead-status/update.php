<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LeadStatus $model */

$this->title = 'Смена статуса лида: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статус лида', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Статус лида: ' .$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="lead-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
