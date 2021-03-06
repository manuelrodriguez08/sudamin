<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_persona',
            'nombres',
            'apellidos',
            'tipo_documento',
            'documento',
            // 'ciudad',
            // 'direccion',
            // 'celular',
            // 'correo',
            // 'perfil',
            // 'usuario',
            // 'contrasena:ntext',
            // 'estado',
            // 'rol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
