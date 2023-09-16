<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kinds $model */

$this->title = 'Создание вида';
$this->params['breadcrumbs'][] = ['label' => 'Виды животных', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
