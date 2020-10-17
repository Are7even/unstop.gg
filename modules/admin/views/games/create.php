<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Games */

$this->title = Yii::t('admin', 'Create Games');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Games'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
