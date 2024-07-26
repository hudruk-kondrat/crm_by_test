<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name Название
 * @property float $price Цена
 * @property string $description Описание
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description'], 'required'],
            [['price'], 'number'],
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
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }
}
