<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = 'Создание продукта';
$this->params['breadcrumbs'][] = ['label' => 'Продукты компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
