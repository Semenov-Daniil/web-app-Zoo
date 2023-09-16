<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Premises $model */

$this->title = 'Создать запись Помещения';
$this->params['breadcrumbs'][] = ['label' => 'Помещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="premises-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
