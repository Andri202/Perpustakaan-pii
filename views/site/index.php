<?php

/* @var $this yii\web\View */
use app\models\Buku;
use app\models\Penerbit;
use app\models\Penulis;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang</h1>

        <p class="lead">Perpustakaan Latihan Andri Gunawan</p>

    </div>

    <div class="body-content">

<!--         <div class="row">
            <div class="col-lg-4">

                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->
    <div class="container">
        <div class="text-center">
            <div class="row">
                <div class="col-md-4">
                    <h3>Jumlah Buku : </h3>
                    <h1><?php echo (Buku::getHitungBuku()); ?></h1>
                </div>
                <div class="col-md-4">
                    <h3>Jumlah Penulis : </h3>
                    <h1><?php echo (Penulis::getHitungPenulis()); ?></h1>
                </div>
                <div class="col-md-4">
                    <h3>Jumlah Penerbit : </h3>
                    <h1><?php echo (Penerbit::getHitungPenerbit()); ?></h1>
                </div>
            </div>
        </div>
    </div>
    
</div>