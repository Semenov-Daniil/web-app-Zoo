<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Форма расчета корма';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'register-form']); $form->enableClientValidation = false; ?>

                <?= $form->field($model, 'title')->dropdownList($listTitle)->label('Выбериет название помещения: '); ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Определить количество корма', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
