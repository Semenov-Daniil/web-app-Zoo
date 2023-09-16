<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Accommodation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="accommodation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kinds_id')->textInput() ?>

    <?= $form->field($model, 'premises_id')->textInput() ?>

    <?= $form->field($model, 'count_animals')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
