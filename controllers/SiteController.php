<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TestModel;
use yii\web\ServerErrorHttpException;

class SiteController extends Controller
{
    public $layout = 'base';
    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

//    public function beforeAction($action)
//    {
//        if($action->id === 'index'){
//            $this->layout = 'login';
//        }
//        echo '<pre><br><br><br><br>';
//        var_dump("Controller before action");
//        echo '</pre>';
//        return parent::beforeAction($action);
//    }

//    public function afterAction($action, $result) //perfect to inject code into html
//    {
//        echo '<pre><br><br><br><br>';
//        var_dump($result);
//        echo '</pre>';
//        return parent::afterAction($action, $result);
//    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        Yii::$app->test->hello();
//        echo '<pre><br><br>';
//        var_dump(Yii::$app->test);
//        echo '</pre>';

//        echo '<pre><br><br>';
//        var_dump(Yii::$app->assetManager);
//        echo '</pre>';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

//    public function actionHello($message){
//        return $this->render('hello', [
//            'message' => $message
//        ]);
//    }

//    public function actionTest()
//    {
//        $test = new TestModel();
//        $test->name = 'John';
//        $test['surname'] = 'Doe';
//        $test->email = 'john@example.com';
//        $test->myAge = 30;
//        foreach ($test as $attr => $value) {
//            echo $attr . ' ' . $test->getAttributeLabel($attr) . ' = ' . $value . '<br>';
//        }
//        if ($test->validate()) {
//            echo "OK";
//        } else {
//            echo '<pre><br><br>';
//            var_dump($test->errors);
//            echo '</pre>';
//            echo "Error";
//        }


//        echo $test['surname'];
//
//        echo '<pre>';
//        var_dump($test->attributes());
//        var_dump($test->getAttributeLabel('name'));
//        var_dump($test->getAttributeLabel('surname'));
//        echo '</pre>';
//    }

//public function actionTest(){
//        $test = new TestModel();
//        $post = [
//            'name' => 'John',
//            'surname' => 'Doe',
//            'email' => 'john@example.com',
//            'myAge' => 30,
//        ];
//        $test->attributes = $post;
//
//    if ($test->validate()) {
//            echo "OK";
//        } else {
//            echo '<pre><br><br>';
//            var_dump($test->errors);
//            echo '</pre>';
//            echo "Error";
//        }
//}

//    public function actionRequest()
//    {
//    echo $_GET['id'] ?? null ;
//    echo '<br>';
//    echo Yii::$app->request->get('id');

//    $id = isset($_GET['id']) ? $_GET['id'] : null;
//    $id = Yii::$app->request->get('id', 50);

//    $get = Yii::$app->request->get();
//    echo '<pre>';
//    var_dump($get);
//    echo '</pre>';

//        $post = Yii::$app->request->post('name', 'Thecodeholic');
//        echo '<pre>';
//        var_dump($post);
//        echo '</pre>';
//        echo Yii::$app->request->hostInfo;
//        echo Yii::$app->request->pathInfo;

//        echo '<pre>';
//        var_dump(Yii::$app->request->getBodyParams());
//        echo '</pre>';

//        $req = Yii::$app->request;
//        echo '<pre>';
//        var_dump($req->userAgent); //string(111) "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36"
//        var_dump($req->headers);
//        var_dump($req->userIP);
//        var_dump($req->userHost);
//        var_dump($_SERVER['REMOTE_ADDR']);
//        echo '</pre>';
//
//    }

//    public function actionResponse()
//    {
//        $response = Yii::$app->response;
//        $response->statusCode = 404;
//        $response->content = 'Hello From Thecodeholic';

//    throw new NotFoundHttpException();
//    throw new ServerErrorHttpException();

//        Yii::$app->response->format = Response::FORMAT_XML;
//        Yii::$app->response->format = Response::FORMAT_JSON;
//        Yii::$app->response->data = [
//            'name' => 'Zura',
//            'surname' => 'Something'
//        ];

//        return $this->redirect('about');
//        return Yii::$app->response->redirect('about');
//        return Yii::$app->response->redirect('about', 301).send(); //redirect not from controller
//    }
}
