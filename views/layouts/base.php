<?php
?>

<!--@var $content string-->
<!--@var this \yii\web\View-->
<?php $this->beginContent('@app/views/layouts/clear.php') ?>
    <header>
        Header goes here
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <?php echo $content ?>
            </div>
            <div class="col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">Sidebar Item 1</li>
                    <li class="list-group-item">Sidebar Item 2</li>
                    <li class="list-group-item">Sidebar Item 3</li>
                </ul>
                <hr>
                <?php if(isset($this->blocks['sidebar'])): ?>
                    <?php echo $this->blocks['sidebar'] ?>
                <?php endif; ?>
            </div>
        </div>

    </div>N
    <footer>
        Footer goes here
    </footer>
<?php $this->endContent(); ?>

