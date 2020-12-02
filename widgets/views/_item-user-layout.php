<?php use yii\helpers\Html;
use yii\helpers\Url; ?>
<div class="dropdown dropdown-avatar">
    <img class="avatar dropbtn" src="/web/upload/user/<?php echo $model->photo?>" alt="avatar">
    <div class="dropdown-content">
        <div class="avatar-title">
            <p><?php echo $model->username?></p>
<!--            <p>--><?php //echo $model->authAssignment->item_name?><!--</p>-->
        </div>
        <a href="#"><?php echo Yii::t('admin','Reputation')?>: <?php echo $model->reputation?></a>
        <a href="#"><?php echo Yii::t('admin','Kudo')?>: 100500</a>
        <a href="<?=Url::toRoute(['cabinet/index','id'=>Yii::$app->user->id])?>"><?php echo Yii::t('admin','Cabinet')?></a>
        <a href="/admin/default"><?php echo Yii::t('admin','Admin panel')?></a>
        <?php echo Html::a(Yii::t('admin','Exit'),Url::toRoute(['auth/logout']))?>
    </div>
</div>
