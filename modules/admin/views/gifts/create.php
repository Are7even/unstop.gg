<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gifts */

$this->title = Yii::t('admin', 'Create Gifts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Gifts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gifts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
