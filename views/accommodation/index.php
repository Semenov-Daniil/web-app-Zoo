<?php

use app\models\Accommodation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchAccommodation $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Accommodations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Accommodation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kinds_id',
            'premises_id',
            'count_animals',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Accommodation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
