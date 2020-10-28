<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stage */

$this->title = Yii::t('admin', 'Create Stage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Stages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
