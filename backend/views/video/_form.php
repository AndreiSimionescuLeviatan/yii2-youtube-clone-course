<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */
\backend\assets\TagsInputAsset::register($this);
?>

<style>
    .custom-input {
        background-color: #0a53be;
    }
</style>
<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-sm-8">

                <?php echo $form->errorSummary($model)?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <label><?php echo $model->getAttributeLabel('thumbnail')?> </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input"
                           id="thumbnail" name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                </div>
            </div>


                <?=  $form->field($model, 'tags',[
                        'inputOptions'=>['data-role'=>'tagsinput','class' => 'custom-input']
                ])->textInput(['maxlength' => true]) ?>

<!--                --><?php //= $form->field($model, 'status')->textInput() ?>
        </div>
        <div class="col-sm-4">

            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <video class="embed-responsive-item" poster="<?php echo $model->getThumbnailLink() ?>" src="<?php echo $model->getVideoLink() ?>" controls></video>
            </div>

            <div class="mb-3">
                <div class="text-muted">Video link</div>
                <a href="<?php echo $model->getVideoLink() ?>">
                    Open Video
                </a>

            </div>

            <div class="mb-3">
                <div class="text-muted">Video Name</div>
                <?php echo $model->video_name?>
            </div>

            <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
        </div>
    </div>

<!--    --><?php //= $form->field($model, 'video_id')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'status')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'has_thumbnail')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'video_name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?php //= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
