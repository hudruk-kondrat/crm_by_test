<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_log".
 *
 * @property int $id
 * @property string|null $date Дата
 * @property int $lead_id Лид
 * @property int $user_id Менеджер
 * @property int $lead_status_id Статус лида
 * @property int $stages_transactions_id Статус сделки
 * @property string $products Продукты
 *
 * @property Lead $lead
 * @property LeadStatus $leadStatus
 * @property StagesTransactions $stagesTransactions
 * @property User $user
 */
class WorkLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'products'], 'safe'],
            [['lead_id', 'user_id', 'lead_status_id', 'stages_transactions_id'], 'required'],
            [['lead_id', 'user_id', 'lead_status_id', 'stages_transactions_id'], 'integer'],
            [['lead_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lead::class, 'targetAttribute' => ['lead_id' => 'id']],
            [['lead_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadStatus::class, 'targetAttribute' => ['lead_status_id' => 'id']],
            [['stages_transactions_id'], 'exist', 'skipOnError' => true, 'targetClass' => StagesTransactions::class, 'targetAttribute' => ['stages_transactions_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'lead_id' => 'Лид',
            'user_id' => 'Менеджер',
            'lead_status_id' => 'Статус лида',
            'stages_transactions_id' => 'Статус сделки',
            'products' => 'Продукты',
        ];
    }

    /**
     * Gets query for [[Lead]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLead()
    {
        return $this->hasOne(Lead::class, ['id' => 'lead_id']);
    }

    /**
     * Gets query for [[LeadStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeadStatus()
    {
        return $this->hasOne(LeadStatus::class, ['id' => 'lead_status_id']);
    }

    /**
     * Gets query for [[StagesTransactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStagesTransactions()
    {
        return $this->hasOne(StagesTransactions::class, ['id' => 'stages_transactions_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public function beforeSave($insert)
    {
        $this->products= \yii\helpers\Json::encode($this->products);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->products= \yii\helpers\Json::decode($this->products);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {
            if (isset($changedAttributes['user_id']) and $this->user_id != $changedAttributes['user_id']) {
                $to  = (User::find()->where(['id'=>$this->user_id])->One())->email ;
                $subject = "Лид назначен";
                $message = ' <p>Вам добавлен лид: </p>'. (Lead::find()->where(['id'=>$this->user_id])->One())->name.' '.(Lead::find()->where(['id'=>$this->user_id])->One())->telephone.' '.(Lead::find()->where(['id'=>$this->user_id])->One())->email;
                $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
                $headers .= "From: От кого письмо <from@crm.com>\r\n";
                $headers .= "Reply-To: reply-to@crm.com\r\n";
                mail($to, $subject, $message, $headers);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

}
