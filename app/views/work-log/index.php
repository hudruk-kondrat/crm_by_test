<?php

use app\models\WorkLog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\datetime\DateTimePicker;
/** @var yii\web\View $this */
/** @var app\models\WorkLogSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'CRM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  /*
    <p>
        <?= Html::a('Create Work Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
*/ ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'date',
                'label'=>'Дата',
                'filter'=>DateTimePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date',
                    'language' => 'ru',
                    'type'=> DateTimePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                    ]
                ]),
            ],
            [
                'attribute' => 'lead',
                'label' => 'Лид',
                'value' => 'lead.name',
            ],
            [
                'attribute' => 'user',
                'label' => 'Менеджер',
                'value' => 'user.login',
            ],
            [
                'attribute' => 'leadStatus',
                'label' => 'Статус лида',
                'value' => 'leadStatus.name',
            ],
            [
                'attribute' => 'stagesTransactions',
                'label' => 'Этап сделки',
                'value' => 'stagesTransactions.name',
            ],
            [
                'attribute' => 'Продукты',
                'format' => 'ntext',
                'content' => function ($data) {
                    $list='<ul>';
                    foreach ($data->products as $product) {
                        $list .= '<li>'.(\app\models\Products::find()->where(['id'=>$product])->one())->name.'</li>';
                    }
                    $list.='<ul>';
                    return $list;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'header'=>'Действия',
                'template'=>'{update}',
                'urlCreator' => function ($action, WorkLog $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
