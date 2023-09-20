<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Расчет численности';
$this->params['breadcrumbs']['form-count-kinds'] = 'Форма расчета численности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'family',
                'label' => 'Семейство',
            ],
            [
                'attribute' => 'count_kinds',
                'label' => 'Кол-во вида',
            ],
            
        ],
    ]);?>

    <?=Html::a('Экспорт1', ['site/export1', 'title' => 'count_kinds'], ['class' => 'btn btn-primary']);?>
    <?=Html::a('Экспорт2', ['site/export2', 'title' => 'count_kinds'], ['class' => 'btn btn-primary']);?>

</div>
