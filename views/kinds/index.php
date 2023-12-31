<?php

use app\models\Kinds;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchKinds $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Виды животных';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вид', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            // [
            //     'attribute' => 'Название',
            //     'value' => 'title'
            // ],
            'family',
            'continent',
            'count_feed',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kinds $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
