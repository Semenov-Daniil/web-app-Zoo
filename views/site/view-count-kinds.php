<?php

use yii\helpers\Html;

$this->title = 'Расчет численности';
$this->params['breadcrumbs']['form-count-kinds'] = 'Форма расчета численности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kinds-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Общая численность представителей семейства "<?=$family?>" - <?=$count?></p>

</div>
