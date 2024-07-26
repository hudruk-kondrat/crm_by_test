<?php
namespace app\commands;

use app\components\RbacItems;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        //Добавляем роли
        $manager = $auth->createRole(RbacItems::ROLE_MANAGER);
        $admin = $auth->createRole(RbacItems::ROLE_ADMIN);
        
        // для администратор
        $cedStatus = $auth->createPermission(RbacItems::TASK_CED_STATUS);
        $cedStatus->description = 'создание/редактирование/удаление статусов лида и сделки';
        $auth->add($cedStatus);

        $cedUser = $auth->createPermission(RbacItems::TASK_CED_USER);
        $cedUser->description = 'создание/редактирование/удаление пользователей';
        $auth->add($cedUser);

        //для менеджера
        $cedUnit = $auth->createPermission(RbacItems::TASK_CED_UNIT);
        $cedUnit->description = 'создание/редактирование/удаление лидов и продуктов';
        $auth->add($cedUnit);

        $managementStatus = $auth->createPermission(RbacItems::TASK_MANAGEMENT_STATUS);
        $managementStatus->description = 'управляет статусами лида и сделки';
        $auth->add($managementStatus);

        $auth->add($manager);
        $auth->add($admin);

        //Добавляем права
        // для администратор
        $auth->addChild($admin,$cedStatus);
        $auth->addChild($admin,$cedUser);
           //для инструктора и обучаемого
        $auth->addChild($manager, $cedUnit);
        $auth->addChild($manager, $managementStatus);


        $auth->addChild($admin, $manager);

        // Назначение ролей пользователям.
        $auth->assign($admin, 1);
    }
}

