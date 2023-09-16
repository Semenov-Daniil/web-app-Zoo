<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Accommodation $model */

$this->title = 'Обносить запись Размещение: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Размещение', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="accommodation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
