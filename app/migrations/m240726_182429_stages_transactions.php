<?php

use yii\db\Migration;

/**
 * Class m240726_182429_stages_transactions
 */
class m240726_182429_stages_transactions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stages_transactions}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('Название'),
            'description'=>$this->string()->comment('Описание'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stages_transactions}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182429_stages_transactions cannot be reverted.\n";

        return false;
    }
    */
}
