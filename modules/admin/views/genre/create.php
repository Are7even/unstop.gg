<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Genre */

$this->title = Yii::t('admin', 'Create Genre');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Genres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
