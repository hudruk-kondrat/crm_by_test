<?php

use yii\db\Migration;

/**
 * Class m240726_182440_work_log
 */
class m240726_182440_work_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_log}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()'))->comment('Дата'),
            'lead_id'=>$this->integer()->notNull()->comment('Лид'),
            'user_id'=>$this->integer()->notNull()->comment('Менеджер'),
            'lead_status_id'=>$this->integer()->notNull()->comment('Статус лида'),
            'stages_transactions_id'=>$this->integer()->notNull()->comment('Статус сделки'),
            'products'=>$this->text()->notNull()->comment('Продукты'),
        ]);

        $this->createIndex(
            'idx_lead_id',
            'work_log',
            'lead_id'
        );

        $this->addForeignKey(
            'leadId',
            '{{%work_log}}',
            'lead_id',
            'lead',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx_user_id',
            'work_log',
            'user_id'
        );

        $this->addForeignKey(
            'userId',
            '{{%work_log}}',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx_lead_status_id',
            'work_log',
            'lead_status_id'
        );

        $this->addForeignKey(
            'leadStatusId',
            '{{%work_log}}',
            'lead_status_id',
            'lead_status',
            'id',
            'CASCADE'
        );



        $this->createIndex(
            'idx_stages_transactions_id',
            'work_log',
            'stages_transactions_id'
        );

        $this->addForeignKey(
            'stagesTransactionsId',
            '{{%work_log}}',
            'stages_transactions_id',
            'stages_transactions',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%work_log}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240726_182440_work_log cannot be reverted.\n";

        return false;
    }
    */
}
