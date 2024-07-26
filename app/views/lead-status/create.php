<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LeadStatus $model */

$this->title = 'Создание статуса лида';
$this->params['breadcrumbs'][] = ['label' => 'Статус лида', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
