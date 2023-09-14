<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    //adici ii dau o clasa
    'options'=>['class'=>'navbar-expand-lg navbar-light bg-light shadow-sm']
]);
$menuItems = [
    ['label' => 'Create', 'url' => ['/video/create']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
}
else
{
    $menuItems[]=[
        'label'=>'Logout ('.Yii::$app->user->identity->username.')',
        // ma duc spre logout cand dau click aici
        'url'=>['site/logout'],
        'linkOptions'=>[
            'data-method'=>'post'
        ]
    ];
}
//afiseaza url in fomrat fara a specifica urlmanager
//    echo \yii\helpers\Url::to(['/site/logout']);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>


