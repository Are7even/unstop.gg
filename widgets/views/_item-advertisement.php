<?php
use yii\helpers\Url;
?>

<div class="popular-post">


<!--    <a href="--><?//= Url::toRoute(['/site/view','id'=>$model->id])?><!--" class="popular-img"><img src="--><?//= $model->getImage();?><!--" alt="">-->
    <a href="#" class="popular-img"><img src="<?= $model->getImage();?>" alt="">

        <div class="p-overlay"></div>
    </a>

    <div class="p-content">
<!--        <a href="--><?//= Url::toRoute(['/site/view','id'=>$model->id])?><!--" class="text-uppercase">--><?//= $model->title?><!--</a>-->
        <a href="#" class="text-uppercase"><?= $model->title?></a>
        <span class="p-date"><?php echo $model->description; ?></span>

    </div>
</div>
