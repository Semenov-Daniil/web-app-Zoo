<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Форма расчета численности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'register-form']); $form->enableClientValidation = false; ?>

            <?= $form->field($model, 'family')->dropdownList($listTitle)->label('Выберите семейство:'); ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Определить численность  ', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
