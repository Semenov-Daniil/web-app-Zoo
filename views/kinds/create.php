<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kinds $model */

$this->title = 'Create Kinds';
$this->params['breadcrumbs'][] = ['label' => 'Kinds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
