<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advertisement */

$this->title = Yii::t('admin', 'Create Advertisement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Advertisements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
