<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\AppAsset::register($this)
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <?php  $form=\yii\bootstrap5\ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]) ?>
        <div class="upload-icon">
                <i class="fa-solid fa-upload"></i>
            </div>
            <p>Drag and drop a file you want tu upload</p>
            <p class="text-muted">Your video will be private until yout publish it</p>

        <?php echo $form->errorSummary($model)?>
        <p>

        </p>
            <button class="btn btn-primary btn-file">
                Select file
                <input type="file" id="videoFile" name="video">
            </button>
            <?php \yii\bootstrap5\ActiveForm::end()?>
    </div>
</div>
