<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lead $model */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Лиды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
