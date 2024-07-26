<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkLog $model */

$this->title = 'CRM: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'CRM', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="work-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
