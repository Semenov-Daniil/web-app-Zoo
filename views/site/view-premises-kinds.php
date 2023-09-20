<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Виды в помещении';
$this->params['breadcrumbs']['form-premises-kinds'] = 'Форма определения видов в помещении';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            
        ],
    ]);?>

    <?=Html::a('Экспорт1', ['site/export1', 'title' => 'premises_kinds'], ['class' => 'btn btn-primary']);?>
    <?=Html::a('Экспорт2', ['site/export2', 'title' => 'premises_kinds'], ['class' => 'btn btn-primary']);?>

</div>
