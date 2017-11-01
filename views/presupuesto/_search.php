<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presupuestos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_presupuesto') ?>

    <?= $form->field($model, 'tipo_horno') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'actualizacion') ?>

    <?= $form->field($model, 'cliente') ?>

    <?php // echo $form->field($model, 'valor_final') ?>

    <?php // echo $form->field($model, 'descuento') ?>

    <?php // echo $form->field($model, 'inicio') ?>

    <?php // echo $form->field($model, 'fin') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
