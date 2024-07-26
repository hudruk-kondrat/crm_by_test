<?php

namespace app\models;

use Yii;
use app\components\RbacItems;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login Логин
 * @property string $password Пароль
 * @property string $firstname Имя
 * @property string $lastname Фамилия
 * @property string $role Роль
 * @property string $email Почта
 *
 * @property WorkLog[] $workLogs
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'firstname', 'lastname', 'email'], 'required'],
            [['login', 'password', 'firstname', 'lastname', 'role', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'role' => 'Роль',
            'email' => 'Почта',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->password = md5($this->password);
        } else {
            if ($this->password != $this->getOldAttribute('password')) {
                $this->password = md5($this->password);
            }
        }
        return parent::beforeSave($insert);
    }


    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {
            if(isset($changedAttributes['role']) AND $this->role!=$changedAttributes['role']) {
                $auth = Yii::$app->authManager;
                $auth->revokeAll($this->id);
                $authorRole = $auth->getRole($this->role);
                $auth->assign($authorRole, $this->id);
            }
        } else {
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole($this->role);
            $auth->assign($authorRole, $this->id); // Назначаем пользователю, которому принадлежит модель User
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function getRol()
    {
        return \app\components\RbacItems::getRoleName($this->role);
    }


    public function beforeDelete()
    {
        $auth = Yii::$app->authManager;
        $auth->revokeAll($this->id);
        return parent::beforeDelete();
    }

    /**
     * Gets query for [[WorkLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkLogs()
    {
        return $this->hasMany(WorkLog::class, ['user_id' => 'id']);
    }
}
