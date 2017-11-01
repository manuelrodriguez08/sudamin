<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presupuestos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presupuestos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_horno')->dropDownList([ 'Unidad Industrial' => 'Unidad Industrial', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'actualizacion')->textInput() ?>

    <?= $form->field($model, 'cliente')->textInput() ?>

    <?= $form->field($model, 'valor_final')->textInput() ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <?= $form->field($model, 'inicio')->textInput() ?>

    <?= $form->field($model, 'fin')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'Edicion' => 'Edicion', 'Visita' => 'Visita', 'Generada' => 'Generada', 'Finalizada' => 'Finalizada', 'Aprobada' => 'Aprobada', 'Rechazada' => 'Rechazada', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
