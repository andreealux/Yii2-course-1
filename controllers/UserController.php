<?php

namespace app\controllers;

use yii\db\Expression;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionIndex()
    {

//        $db = new \yii\db\Connection([
//            'dsn' => 'mysql:host=localhost;dbname=yii2_course',
//            'username' => 'root',
//            'password' => '',
//            'charset' => 'utf8mb4'
//        ]);

        $db = \Yii::$app->db;
        $users = $db->createCommand("SELECT * FROM user")->queryAll();
//        $users = $db->createCommand("SELECT COUNT(*) FROM user")->queryScalar();
//        $users = $db->createCommand("SELECT username FROM user")->queryAll();
//        $users = $db->createCommand("SELECT username FROM user")->queryColumn();
//        $users = $db->createCommand("SELECT * FROM user WHERE id = 1")->queryOne();
        echo '<pre>';
        var_dump($users);
        echo '</pre>';
        return "Lists of users";
    }

    public function actionView($id){
        $db = \Yii::$app->db;
//        $user = $db->createCommand("SELECT * FROM user WHERE id = :id")
//            ->bindValue('id',$id)
//            ->queryOne();

        $command = $db->createCommand("SELECT * FROM user WHERE id = :id");
        $user2 = $command->bindParam('id', $id)->queryOne();

        echo '<pre>';
        var_dump($user2);
        echo '</pre>';

        $id = 3;
        $user3 = $command->bindParam('id', $id)->queryOne();
        echo '<pre>';
        var_dump($user3);
        echo '</pre>';


    }

    public function actionCreate()
    {
        $db = \Yii::$app->db;
//        $result = $db->createCommand()->insert('user', [
//            'username' => 'tom',
//            'email' => 'tom@gmail.com',
//            'status' => 1
//        ])->execute();

        $result = $db->createCommand()->batchInsert('user',['username', 'status'],
        [
           [   'username' => 'user1',
               'status' => 1] ,
            [  'username' => 'user2',
                'status' => 1] ,
        ])->execute();

        echo '<pre>';
        var_dump($result);
        echo '</pre>';

        return "User created";
    }

    public function actionUpdate()
    {
        $db = \Yii::$app->db;
//        $db->createCommand()->update('user', [
//            'email' => 'user1@example.com'
//        ],[
//            'id' => 8,
//        ])->execute();
        $db->createCommand()->update('user', [
            'email' => new Expression('CONCAT(username, \'@example.com\')')
        ],[
            'email' => '',
        ])->execute();
        return "User updated";
    }

    public function actionDelete($id)
    {
        $db = \Yii::$app->db;
        $db->createCommand()->delete('user',
            'id = :id', ['id' => $id]
        )->execute();
        return "User deleted";
    }

    public function actionUpsert(){
        $db = \Yii::$app->db;
        $db->createCommand()->upsert('user', [
            'username' => 'john',
            'email' => 'john.doe@example.com'
        ], [
            'email' => 'john.doe@example.com'
        ])->execute();
    }

    public function actionQuoting(){
        $db = \Yii::$app->db;
        // SELECT `username` from `user`
        // SELECT IFNULL(`email`, `username`) FROM `user`;

        $db->createCommand("SELECT IFNULL([[email]], [[username]]) FROM {{user}}")->execute();
    }
}