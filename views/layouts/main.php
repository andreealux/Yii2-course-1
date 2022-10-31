<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <?php echo $this->head() ?>

</head>
<body>
<?php echo $this->beginBody() ?>
<!-- Navigation-->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <a class="btn btn-primary" href="#signup">Sign Up</a>
    </div>
</nav>

<?php echo $content ?>


<!-- Footer-->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item"><a href="#!">About</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Contact</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                    <li class="list-inline-item">⋅</li>
                    <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2022. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-facebook fs-3"></i></a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a href="#!"><i class="bi-twitter fs-3"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!"><i class="bi-instagram fs-3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php echo $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>


//use app\assets\AppAsset;
//use app\widgets\Alert;
//use yii\bootstrap5\Breadcrumbs;
//use yii\bootstrap5\Html;
//use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;
//
//AppAsset::register($this);
//
//$this->registerCsrfMetaTags();
//$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
//$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
//$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
//$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
//$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
//?>
<?php //$this->beginPage() ?>
<!--<!DOCTYPE html>-->
<!--<html lang="--><?//= Yii::$app->language ?><!--" class="h-100">-->
<!--<head>-->
<!--    <title>--><?//= Html::encode($this->title) ?><!--</title>-->
<!--    --><?php //$this->head() ?>
<!--</head>-->
<!--<body class="d-flex flex-column h-100">-->
<?php //$this->beginBody() ?>
<!---->
<!--<header id="header">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest
//                ? ['label' => 'Login', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
<!--</header>-->
<!---->
<!--<main id="main" class="flex-shrink-0" role="main">-->
<!--    <div class="container">-->
<!--        --><?php //if (!empty($this->params['breadcrumbs'])): ?>
<!--            --><?//= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
<!--        --><?php //endif ?>
<!--        --><?//= Alert::widget() ?>
<!--        --><?//= $content ?>
<!--    </div>-->
<!--</main>-->
<!---->
<!--<footer id="footer" class="mt-auto py-3 bg-light">-->
<!--    <div class="container">-->
<!--        <div class="row text-muted">-->
<!--            <div class="col-md-6 text-center text-md-start">&copy; My Company --><?//= date('Y') ?><!--</div>-->
<!--            <div class="col-md-6 text-center text-md-end">--><?//= Yii::powered() ?><!--</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!---->
<?php //$this->endBody() ?>
<!--</body>-->
<!--</html>-->
<?php //$this->endPage() ?>
