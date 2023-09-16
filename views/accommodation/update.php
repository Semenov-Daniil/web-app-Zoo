<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Accommodation $model */

$this->title = 'Update Accommodation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
