<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/img/bn.jpg'; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo (Yii::$app->user->identity->nama); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/index']],
                    ['label' => 'Daftar Buku','icon' => 'book', 'url' => ['/buku/index']],
                    ['label' => 'Daftar Penulis','icon' => 'pencil', 'url' => ['/penulis/index']],
                    ['label' => 'Daftar Penerbit','icon' => 'paper-plane', 'url' => ['/penerbit/index']],
                    ['label' => 'Daftar Peminjaman','icon' => 'arrow-circle-down', 'url' => ['/peminjaman/index']],
                    ['label' => 'Daftar pengembalian','icon' => 'reply', 'url' => ['/pengembalian/index']],
                    ['label' => 'Daftar User','icon' => 'users', 'url' => ['/user/index']],
                    ['label' => 'Setting','icon' => 'key', 'url' => ['/setting/view', 'id' => '1']],
                    

                    ['label' => 'SISTEM','options' => ['class' => 'header']],
                    ['label' => 'Profil','icon' => 'user', 'url' => ['/user/view', 'id' => Yii::$app->user->identity->id]],
                    ['label' => 'Logout','icon' => 'sign-out', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
