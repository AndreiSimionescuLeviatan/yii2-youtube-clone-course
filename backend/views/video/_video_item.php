<?php

/** @var $model \common\models\Video*/

use yii\helpers\Url;

?>

<div class="media">
    <a href="<?php echo Url::to(['video/update','video_id'=>$model->video_id])?>">
        <div class="embed-responsive embed-responsive-16by9 mr-3" ">
            <video class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>" src="<?php echo $model->getVideoLink() ?>" controls></video>
        </div>
    </a>
    <div class="media-body">
        <h6 class="mt-0"><?php echo $model->title ?></h6>
            <?php echo \yii\helpers\StringHelper::truncateWords($model->description,10)?>
    </div>
</div>

