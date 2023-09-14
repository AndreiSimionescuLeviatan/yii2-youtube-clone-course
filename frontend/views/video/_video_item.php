<?php

/** @var $model \common\models\Video*/

use yii\helpers\Url;

?>

<div class="card m-3" style="width: 19rem">
    <a href="<?php echo Url::to(['/video/view','video_id'=>$model->video_id])?>">
        <div class="embed-responsive embed-responsive-16by9 ">
            <video class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>" src="<?php echo $model->getVideoLink() ?>" controls></video>
        </div>
    </a>
    <div class="card-body p-2">
        <h6 class="card-title m-0"><?php echo $model->title?></h6>
        <p class="card-text m-0">
            <?php echo \common\helpers\Html::channelLink($model->createdBy )?>
        </p>
        <p class="card-text m-0">
            <?php echo $model->getViews()->count()?> views .
            <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?>
        </p>

    </div>
</div>
