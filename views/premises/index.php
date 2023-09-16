<?php

use app\models\Premises;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchPremises $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Premises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="premises-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Premises', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'number',
            'is_pond',
            'is_heating',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Premises $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
