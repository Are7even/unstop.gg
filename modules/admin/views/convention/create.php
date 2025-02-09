<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Convention */

$this->title = Yii::t('admin', 'Create Convention');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Conventions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convention-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
