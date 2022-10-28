<?php

use app\assets\AppAsset;

AppAsset::register($this);
?>

<!--@var $content string-->
<!--@var this \yii\web\View-->
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo $this->registerCsrfMetaTags() ?>
    <title>Document</title>
    <?php echo $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php echo $content ?>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
