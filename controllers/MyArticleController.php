<?php

namespace app\controllers;

use yii\web\Controller;

//my-article/hello-world
//my-article -> My-Article -> MyArticle -> MyArticleController -> \app\controllers\MyArticleController
class MyArticleController extends Controller
{
    //inline action
    // action id: hello-world
    //Hello-World -> HelloWorld -> actionHelloWorld
    public function actionHelloWorld(){
        echo "Hello World";
    }

}