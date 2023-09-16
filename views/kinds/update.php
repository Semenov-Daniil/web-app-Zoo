<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kinds $model */

$this->title = 'Обновить вид: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Виды животных', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="kinds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
