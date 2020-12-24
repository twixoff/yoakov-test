<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->getAuthManager();
//        $auth->removeAllAssignments();
        $auth->removeAll();
        $userRole = $auth->createRole(1);   // user
        $adminRole = $auth->createRole(2);   // admin
        $auth->add($userRole);
        $auth->add($adminRole);

        $user = User::findByUsername('demo');
        $auth->assign($userRole, $user->id);

        $user = User::findByUsername('user');
        $auth->assign($userRole, $user->id);

        $admin = User::findByUsername('admin');
        $auth->assign($adminRole, $admin->id);

        return ExitCode::OK;
    }
}
