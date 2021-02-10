<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Confidential */

$this->title = Yii::t('admin', 'Create Confidential');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Confidentials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confidential-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
