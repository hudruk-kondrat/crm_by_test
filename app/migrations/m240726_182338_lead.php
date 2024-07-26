<?php

use yii\db\Migration;

/**
 * Class m240726_182338_lead
 */
class m240726_182338_lead extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lead}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('Имя'),
            'telephone'=>$this->string()->notNull()->comment('Телефон'),
            'email'=>$this->string()->notNull()->comment('Почта'),
            'comment'=>$this->string()->notNull()->comment('Комментарий'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lead}}');
        return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182338_lead cannot be reverted.\n";

        return false;
    }
    */
}
