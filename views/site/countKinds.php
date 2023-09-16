<?php

use app\models\Premises;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>


<div class="site-contact">
    <h2>Форма для определение общего количества представителей одного вида: </h2>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

                    <?= $form->field($model, 'family')->dropdownList($listTitle)->label('Выбериет семейство:'); ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Определить', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>

                <p>Общее количество представителей <?=$promt ? $promt : '(выбериет семейство)'?>: <?=$countKinds ? $countKinds : '' ?></p>

            </div>
        </div>
</div>



