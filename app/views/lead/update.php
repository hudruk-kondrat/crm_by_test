<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lead $model */

$this->title = 'Измениние лида: '. $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Лиды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Лид: '.$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="lead-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
