<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Размещение видов';
$this->params['breadcrumbs']['form-kinds-premises'] = 'Форма размещения видов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'kinds_id',
                'label' => 'ID вида',
            ],
            [
                'attribute' => 'kinds_title',
                'label' => 'Название вида',
            ],
            [
                'attribute' => 'premises_title',
                'label' => 'Название помещения',
            ],
            [
                'attribute' => 'is_pond',
                'label' => 'Водоем',
                'value' => function ($model) {
                    return ($model['is_pond'] ? 'Есть' : 'Нету');
                },
            ],
            
        ],
    ]);?>

    <?=Html::a('Экспорт1', ['site/export1', 'title' => 'kinds_premises'], ['class' => 'btn btn-primary']);?>
    <?=Html::a('Экспорт2', ['site/export2', 'title' => 'kinds_premises'], ['class' => 'btn btn-primary']);?>

</div>



