<?php

use app\models\Premises;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>


<div class="site-contact">
    <h2>Форма для расчета количества корма за сутки: </h2>

    <?//var_dump($listTitle);die;?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

                    <?= $form->field($model, 'title')->dropdownList($listTitle)->label('Выбериет название помещения:'); ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Определить', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>

                <p>Количество корма за сутки в помещении <?=$promt ? $promt : '(выбериет помещение)'?>: <?=$countFeed ? $countFeed . ' (кг)' : '' ?></p>

            </div>
        </div>
</div>



