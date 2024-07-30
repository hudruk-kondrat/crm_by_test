<?php

use yii\db\Migration;

/**
 * Class m240726_182349_lead_status
 */
class m240726_182349_lead_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lead_status}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('Название'),
            'description'=>$this->string()->comment('Описание'),
        ]);


        $this->insert('{{%lead_status}}', [ //добавление первого пользователя системы
            'name'=>'1 статус',
            'description'=>'1 статус',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lead_status}}');
        return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182349_lead_status cannot be reverted.\n";

        return false;
    }
    */
}
