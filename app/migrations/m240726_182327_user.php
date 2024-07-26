<?php

use yii\db\Migration;

/**
 * Class m240726_182327_user
 */
class m240726_182327_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login'=>$this->string()->notNull()->comment('Логин'),
            'password'=>$this->string()->notNull()->comment('Пароль'),
            'firstname'=>$this->string()->notNull()->comment('Имя'),
            'lastname'=>$this->string()->notNull()->comment('Фамилия'),
            'role'=>$this->string()->notNull()->defaultValue('manager')->comment('Роль'),
            'email'=>$this->string()->notNull()->comment('Почта'),
        ]);

        $this->insert('{{%user}}', [ //добавление первого пользователя системы
            'login'=>'admin',
            'password'=>md5('admin'),
            'firstname'=>'Иван',
            'lastname'=>'Иванов',
            'role'=>'admin',
            'email'=>'admin@local.local',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182327_user cannot be reverted.\n";

        return false;
    }
    */
}
