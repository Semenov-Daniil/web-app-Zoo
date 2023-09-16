<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Форма определения видов в помещении';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'register-form']); $form->enableClientValidation = false; ?>

                <?= $form->field($premises, 'title')->dropdownList($listTitle)->label('Помещение:'); ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Определить', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>



