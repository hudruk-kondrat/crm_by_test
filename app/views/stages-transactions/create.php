<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StagesTransactions $model */

$this->title = 'Создание этапа сделки';
$this->params['breadcrumbs'][] = ['label' => 'Этапы сделки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stages-transactions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
