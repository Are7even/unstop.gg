<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fight */

$this->title = Yii::t('admin', 'Create Fight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Fights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
