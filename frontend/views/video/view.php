<?php

/** @var $model \common\models\Video */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div>
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9 ">
            <video class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>" src="<?php echo $model->getVideoLink() ?>" controls></video>
        </div>
    </div>

        <h6 class="mt-2"><?php echo $model->title?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php echo $model->getViews()->count() ?>views * <?php echo Yii::$app->formatter->asDate($model->created_at)?>
<!--                --><?php //echo Yii::$app->formatter->asDate()?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin() ?>
                    <?php echo $this->render('_buttons',[
                            'model'=>$model
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>

        <div>
            <p> <?php echo \common\helpers\Html::channelLink($model->createdBy )?>
            </p>
            <?php echo Html::encode($model->description) ?>
        </div>
</div>


