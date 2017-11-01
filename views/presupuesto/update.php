<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presupuestos */

$this->title = 'Update Presupuestos: ' . $model->id_presupuesto;
$this->params['breadcrumbs'][] = ['label' => 'Presupuestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_presupuesto, 'url' => ['view', 'id' => $model->id_presupuesto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presupuestos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
