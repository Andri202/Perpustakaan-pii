<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\User;
use app\models\Buku;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="login-bg">
<?php $this->beginBody() ?>

<div class="wrap">
<?php if(!Yii::$app->user->isGuest){ ?>
<?php if(User::isAdmin()){ ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'Perpustakaan',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Daftar Buku', 'url' => ['/buku/index']],
            ['label' => 'Daftar Penulis', 'url' => ['/penulis/index']],
            ['label' => 'Daftar Penerbit', 'url' => ['/penerbit/index']],
            ['label' => 'Daftar Peminjaman', 'url' => ['/peminjaman/index']],
            ['label' => 'Profil', 'url' => ['/user/view', 'id' => Yii::$app->user->identity->id]],
            ['label' => 'Daftar User', 'url' => ['/user/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    ?>
    <?php } ?>
    <?php if(User::isUser()){ ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'Perpustakaan',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Daftar Buku', 'url' => ['/buku/index']],
            ['label' => 'Daftar Penulis', 'url' => ['/penulis/index']],
            ['label' => 'Daftar Penerbit', 'url' => ['/penerbit/index']],
            ['label' => 'Profil', 'url' => ['/user/view', 'id' => Yii::$app->user->identity->id]],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    ?>
    <?php } ?>
    <?php } ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Andri Gunawan <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>

