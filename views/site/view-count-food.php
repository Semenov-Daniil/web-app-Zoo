<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Расчет корма';
$this->params['breadcrumbs']['form-count-food'] = 'Форма расчета корма';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Количество корма за сутки в помещении "<?=$premises?>": <?= $sum ?> (кг)</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'premises_title',
                'label' => 'Название помещения',
            ],
            [
                'attribute' => 'kinds_id',
                'label' => 'ID вида',
            ],
            [
                'attribute' => 'kinds_title',
                'label' => 'Название вида',
            ],
            [
                'attribute' => 'count_feed',
                'label' => 'Кол-во корма за сутки',
            ],
            
        ],
    ]);?>

    <?=Html::a('Экспорт1', ['site/export1', 'title' => 'count_food'], ['class' => 'btn btn-primary']);?>
    <?=Html::a('Экспорт2', ['site/export2', 'title' => 'count_food'], ['class' => 'btn btn-primary']);?>

</div>
