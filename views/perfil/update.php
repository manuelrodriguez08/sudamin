<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perfiles */

$this->title = 'Update Perfiles: ' . $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
