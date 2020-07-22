<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $discount
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'discount'], 'required'],
            [['description'], 'string'],
            [['discount'], 'number', 'min'=>0, 'max'=>100],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID discount',
            'name' => 'Name discount',
            'description' => 'Description',
            'discount' => 'Discount',
        ];
    }
}
