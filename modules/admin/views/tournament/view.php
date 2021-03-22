<?php

use app\helpers\TournamentStatusHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tournament */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tournament-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->user->can('admin')):?>
    <p>
        <?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->status === TournamentStatusHelper::$created):?>
            <a class="btn btn-success" href="<?php echo Url::toRoute(['tournament/allow','id'=>$model->id])?>"><?php echo Yii::t('admin', 'Allow')?></a>
        <?php else:?>
            <a class="btn btn-warning" href="<?php echo Url::toRoute(['tournament/disallow','id'=>$model->id])?>"><?php echo Yii::t('admin', 'Disallow')?></a>
        <?php endif;?>
        <?= Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php endif;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'icon',
            'status',
            'author',
            'game',
            'created_at',
            'hidden',
            'handheld',
            'type',
            'rating_on',
            'players_count',
            'start',
            'end',
            'checkin',
            'checkin_start',
            'checkin_end',
            'first_place',
            'second_place',
            'third_place',
            'fourth_place',
            'fifth_place',
        ],
    ]) ?>

</div>
