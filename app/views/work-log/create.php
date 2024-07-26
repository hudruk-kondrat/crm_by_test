<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkLog $model */

$this->title = 'CRM';
$this->params['breadcrumbs'][] = ['label' => 'CRM', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
