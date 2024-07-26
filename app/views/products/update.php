<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = 'Изменение продукта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Продукт: '.$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
