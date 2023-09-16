<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Accommodation $model */

$this->title = 'Create Accommodation';
$this->params['breadcrumbs'][] = ['label' => 'Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
