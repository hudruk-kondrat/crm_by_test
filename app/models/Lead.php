<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lead".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $telephone Телефон
 * @property string $email Почта
 * @property string $comment Комментарий
 *
 * @property WorkLog[] $workLogs
 */
class Lead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lead';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'telephone', 'email'], 'required'],
            [['name', 'telephone', 'email', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'telephone' => 'Телефон',
            'email' => 'Почта',
            'comment' => 'Комментарий',
        ];
    }



    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $wlog = new WorkLog();
            $wlog->lead_id=$this->id;
            $wlog->user_id = Yii::$app->user->identity->id;
            $wlog->lead_status_id = (LeadStatus::find()->One())->id;
            $wlog->stages_transactions_id= (StagesTransactions::find()->One())->id;
            $wlog->products = array();
            $wlog->save();
            $to  = Yii::$app->user->identity->email ;
            $subject = "Лид добавлен";
            $message = ' <p>Вам добавлен лид: </p>'.$this->name.' '.$this->telephone.' '.$this->email;
            $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
            $headers .= "From: От кого письмо <from@crm.com>\r\n";
            $headers .= "Reply-To: reply-to@crm.com\r\n";
            mail($to, $subject, $message, $headers);


        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * Gets query for [[WorkLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkLogs()
    {
        return $this->hasMany(WorkLog::class, ['lead_id' => 'id']);
    }
}
