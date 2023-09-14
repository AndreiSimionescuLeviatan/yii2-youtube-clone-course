<?php
/* @var $this yii\web\View */

use backend\assets\AppAsset;

AppAsset::register($this);
?>

<style>

    hmtl,
    body
    {
        height: 100%;
    }

    main{
        flex: 1;
    }

    .content-wrapperr
    {
        flex:1;
    }

    aside{
        min-width: 200px;
    }
    aside .nav-pills .nav-link{
        border-radius: 0;
        color: #444444;
    }

    aside .nav-pills .nav-link:hover{
        background: rgba(0,0,0,0.05);
    }

    aside .nav-pills .nav-link.active{
        background: rgba(0,0,0,0.05);
        color: #b90000;
        border-left: 4px solid #b90000;
    }

    .upload-icon {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 70px;
        color: #454545;
    }

    .btn-file {
        position: relative;
    }
    .btn-file input {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }


</style>
    <aside class="shadow">
        <?php  echo \yii\bootstrap5\Nav::widget([
            'options'=>[
                'class'=> 'd-flex flex-column nav-pills my-nav-pills'
            ],
            'items'=>[
                [
                    'label'=>'Dashboard',
                    'url'=>['/site/index']
                ],
                [
                    'label'=>'Videos',
                    'url'=>['/video/index']
                ]
            ]
        ])
        ?>
    </aside>

