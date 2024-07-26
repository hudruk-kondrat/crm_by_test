<?php

use yii\db\Migration;

/**
 * Class m240726_182359_products
 */
class m240726_182359_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('Название'),
            'price'=>$this->double()->notNull()->comment('Цена'),
            'description'=>$this->string()->notNull()->comment('Описание'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
        return false;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182359_products cannot be reverted.\n";

        return false;
    }
    */
}
