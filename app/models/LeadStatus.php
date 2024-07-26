<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lead_status".
 *
 * @property int $id
 * @property string $name Название
 * @property string|null $description Описание
 *
 * @property WorkLog[] $workLogs
 */
class LeadStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lead_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[WorkLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkLogs()
    {
        return $this->hasMany(WorkLog::class, ['lead_status_id' => 'id']);
    }
}
