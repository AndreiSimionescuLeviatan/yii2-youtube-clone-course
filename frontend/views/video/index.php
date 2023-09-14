<?php

/**  @var  $dataProvider \yii\data\ActiveDataProvider */

?>

<?php echo \yii\widgets\ListView::widget([
    //daca am daor dataProvider se vor afisa implicit niste primary key
    // trebuie s adaugam si itemi
        'dataProvider'=>$dataProvider,
        'itemView'=>'_video_item',
        'layout'=>'<div class="d-flex flex-wrap">{items}</div>{pager}',
        'itemOptions'=>[
            'tag'=>false
        ]
]) ?>
