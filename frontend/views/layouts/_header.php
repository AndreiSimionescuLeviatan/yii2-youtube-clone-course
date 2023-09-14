<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;


NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    //adici ii dau o clasa
    'options'=>['class'=>'navbar-expand-lg navbar-light bg-light shadow-sm']
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
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
?>
<form  action="<?php echo Url::to(['video/search']) ?>" class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>


